@extends('admin.template.master')

@section('css')


<style>



.radio-tile-group {
  display: flex;
  flex-wrap: wrap;
}
.radio-tile-group .input-container {
  position: relative;
  height: 2.2rem;
  width: 2.2rem;
  margin: 0.5rem;
}
.radio-tile-group .input-container .radio-button {
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  margin: 0;
  cursor: pointer;
}
.radio-tile-group .input-container .radio-tile {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  border: 2px solid #079ad9;
  border-radius: 5px;
  padding: 1rem;
  transition: transform 300ms ease;
}
.radio-tile-group .input-container .icon svg {
  fill: #079ad9;
  width: 3rem;
  height: 3rem;
}
.radio-tile-group .input-container .radio-tile-label {
  text-align: center;
  font-size: 1rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  color: #079ad9;
}
.radio-tile-group .input-container .radio-button:checked + .radio-tile {
  background-color: #079ad9;
  border: 2px solid #079ad9;
  color: white;
  transform: scale(1.1, 1.1);
}
.radio-tile-group .input-container .radio-button:checked + .radio-tile .icon svg {
  fill: white;
  background-color: #079ad9;
}
.radio-tile-group .input-container .radio-button:checked + .radio-tile .radio-tile-label {
  color: white;
  background-color: #079ad9;
}

.colsoal{
  flex: 0 0 16.66667%;
  max-width: 16.66667%;
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}

.colsoal::before,.colsoal::after{
  box-sizing: border-box;
}

.sudah{
  background: blue;
}
.sudah  label{
  color: white !important;
}

</style>

@endsection
@section('content')

<div class="col-md-6">
  
   <!-- Slide Modal -->
                      <div class="modal fade modal-right modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="defaultModalLabel">Soal</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body"> 

                                <div class="row listnosoal">

                                <div class="radio-tile-group mr-2 colsoal">
                                  <div class="input-container">
                                    <div class="radio-button"></div>
                                    <div class="radio-tile">
                                      <label for="walk" class="radio-tile-label">1</label>
                                    </div>
                                  </div>
                                </div>


                                </div>

                            </div>
                          </div>
                        </div>
                      </div>

</div>


    <div class="row mb-3">
      <div class="col-md-12">
           <div class="card">
              <div class="card-header bg-secondary">

                <span class="fe fe-clock fe-16 text-white"></span>
                <span class="text-white" id="waktuhabis">Jumlah waktu :00.00 Menit</span>

                 <a class="text-muted float-right" href="#" data-toggle="modal" data-target=".modal-right">
                    <span class="fe fe-grid fe-16 text-white"></span>
                  </a>

              </div>
            </div>
    </div>
    </div>

    <div class="row lissoal">

    <div class="col-md-12 dsol soal">
           <div class="card">
              <div class="card-header bg-primary">
                 <h6 class="text-white">1.</h6>
              </div>
              <div class="card-body">
                
                <div class="pertanyaan">
                PERTANYAAN
                </div>

                <div class="mt-2 row">
                  <div class="col-md-12 mb-4">
                    <div class="card shadow">
                      <div class="card-body listjawaban">
                      <?php $NOJA = 'A' ?>

             
                          
                      <div class="form-check form-check-inline col-md-12 mb-2">                     
                        <div class="radio-tile-group mr-3">
                          <div class="input-container">
                            <input  class="radio-button"
                            value="ali" type="radio" name="soal`+(i+1)+`" />
                            <div class="radio-tile">
                              <label for="walk" class="radio-tile-label">AAA</label>
                            </div>
                          </div>
                        </div>
                 
                      </div>

                     

                      </div>




                    </div> <!-- /.card -->
                  </div> <!-- /.col -->
                </div>

              </div>
           </div>
        </div>

   </div>




    
@endsection

@section('js')

@endsection