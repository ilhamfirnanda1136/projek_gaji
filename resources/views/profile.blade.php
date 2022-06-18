@extends('layouts.base')

@section('container')
<div class="container">
    <div class="row gutters justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card h-100 ">
                <div class="card-body">
                    <form method="post" id="saveForm" enctype="multipart/form-data">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group" style="text-align:center">
                                    <?php
                                        $foto = $user->foto ? asset('img/user/'.$user->foto) : asset('img/no-image.png');
                                    ?>
                                    <img src="{{$foto}}" id="image-profil" alt="issued image" style="width:50%">
                                    <input type="file" name="foto" id="foto" style="display: none" accept=".png,.jpg">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" autocomplete="off" id="name" name="name" placeholder="Enter your name" value="{{ $user->name }}">
                                    <small class="text-danger name"></small>   
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" autocomplete="off" id="email" name="email" placeholder="Enter email ID" value="{{ $user->email }}">
                                    <small class="text-danger email"></small>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" autocomplete="off" id="current_password" name="current_password" placeholder="New Password">
                                    <small class="text-danger current_password"></small>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" autocomplete="off" id="password" name="password" placeholder="New Password">
                                    <small class="text-danger password"></small>   
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" autocomplete="off" id="confirm_password" name="confirm_password" placeholder="Confirm password">
                                    <small class="text-danger confirm_password"></small>   
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" id="submit-btn" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
<script>
    function bacaLink(inputan,image) {
		if (inputan.files && inputan.files[0]) {
            var baca=new FileReader();
            baca.onload=function(e)
            {
                image.attr('src',e.target.result);
                image.hide();
                image.fadeIn(650);
            }
            baca.readAsDataURL(inputan.files[0]);
		}
    }

    $(document).ready(function() {
        
        $('#image-profil').click(function(){
            $('#foto').trigger('click');
        });

        $('#foto').change(function(){
            bacaLink(this,$('#image-profil'));
	    });

        $('#submit-btn').click(function() {
            let form = $('#saveForm')[0];
            let formData = new FormData(form);
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                url: "{{route('profile.edit')}}",
                beforeSend: function () {
                    loading();
                },
                success: function (data) {
                    matikanLoading();
                    if ($.isEmptyObject(data.errors)) {
                        $.each(data.success,function(key){
                            hapusvalidasi(key);
                        });
                        swal({
                            title: "Pesan!",
                            text: "Anda telah berhasil mengupdate profile!",
                            icon: "success",
                        }).then(() => {
                            location.reload();
                        });
                        $('#saveForm')[0].reset();
                    } else {
                        $.each(data.errors, function (key, value) {
                            hapusvalidasi(key);
                            let regex= value.toString().replace('_','&nbsp');
                            let pesan = $(`#`+key);
                            let text= $('.'+key);
                            pesan.addClass('is-invalid');
                            text.text(regex);
                            text.addClass('invalid-feedback');
                        });
                        swal({
                            title: "Pesan!",
                            text: "dimohon untuk memasukkan data dengan benar!",
                            icon: "error",
                        });
                    }
                },
                error:function() {
                matikanLoading();
                alert('maaf ada kesalahan diserver');
            }
            });
        })
    })
</script>

@endsection
