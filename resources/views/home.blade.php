@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Paskolos skaičiuoklė</h2>
                    <h2>(Anuitetinis metodas)</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        @include('layouts.errors')
                        <form class="needs-validation"
                              novalidate
                              action="{{ url('/payments') }}"
                              method="post">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">
                                        Paskolos Pradžios data:
                                    </label>
                                </div>
                                <div class="col-md-8 mb-9">
                                    <input type="date"
                                           class="form-control"
                                           value="{{ old('paymentDate') }}"
                                           name="paymentDate"
                                           id="validationServer01"
                                           required>
                                    <div class="invalid-feedback">
                                        * Įveskite paskolos pradžios datą:!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                      <label for="validationServer02">
                                          Paskolos suma:
                                      </label>
                                </div>
                                <div class="col-md-8 mb-9">
                                    <input type="number"
                                        min="1"
                                        class="form-control"
                                        value="{{ old('creditAmount') }}"
                                        name="creditAmount"
                                        id="validationServer02"
                                        placeholder="Įveskite paskolos sumą" 
                                        required>
                                    <div class="invalid-feedback">
                                        * Įveskite paskolos sumą!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                      <label for="validationServer03">
                                          Metinė Palūkanų norma:
                                      </label>
                                </div>
                                <div class="col-md-8 mb-9">
                                    <input type="number"
                                        step="any"
                                        min="1"
                                        class="form-control"
                                        value="{{ old('interestRate') }}"
                                        name="interestRate"
                                        id="validationServer03"
                                        placeholder="Įveskite Metinę palūkanų normą" 
                                        required>
                                    <div class="invalid-feedback">
                                        * Įveskite palūkanų normą!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                      <label for="validationServer04">
                                          Paskolos trukmė mėnesiais:
                                      </label>
                                </div>
                                <div class="col-md-8 mb-9">
                                    <input type="number"
                                        min="1"
                                        class="form-control"
                                        value="{{ old('paymentsNumber') }}"
                                        name="paymentsNumber"
                                        id="validationServer04"
                                        placeholder="Įveskite Paskolos trukmę mėnesiais" 
                                        required>
                                    <div class="invalid-feedback">
                                        * Įveskite Paskolos trukmę mėnesiais!
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-info">Skaičiuoti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection
