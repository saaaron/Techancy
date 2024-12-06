@extends('layouts.dashboard')

@section('title', 'My profile')

@section('content')  
    <h4>My profile</h4>
    <div class="row">
        <p>Update your account's profile information and profile photo</p>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="d-grid gap-2">
                <div class="d-flex justify-content-center">
                    <div id="user_profile_photo">
                        <div class="lg_profile_photo_prev">
                            <img src="{{ asset('storage/'.auth()->user()->profile_photo) }}" alt="Profile photo">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="#change_profile_photo" data-bs-toggle="modal" data-bs-target="#change_profile_photo_modal">Change profile photo</a>
                </div>
                {{-- change profile photo modal --}}
                <div class="modal fade" id="change_profile_photo_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header p-2 pe-2 ps-2">
                                <h6 class="modal-title"><b>Change profile photo</b></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div id="profile_photo_preview" style="color:transparent"></div>
								<div class="d-grid gap-2">
	                                <div>
	                                    <input type="file" class="form-control" name="profile_photo" id="profile_photo" accept=".jpg, .jpeg, .png">
	                                </div>
	                                <div class="d-grid">
	                                    <button id="profile_photo_upload" class='btn btn-dark btn-block'>Done</button>
	                                </div>
	                            </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            @livewire('edit-profile-form')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     initializeProfilePhotoCrop(); // Call the initialization function on page load
        // });

        // document.addEventListener('livewire:navigate', function() {
        //     initializeProfilePhotoCrop(); // Reinitialize after Livewire navigation
        // });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // function initializeProfilePhotoCrop() {
            $uploadCrop = $('#profile_photo_preview').croppie({
                enableExif: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'circle'
                },
                boundary: { 
                    width: 200,
                    height: 200
                }
            });

            $('#profile_photo').on('change', function() {
                const fileInput = this.files[0];

                if (!fileInput) {
                    alert("Please select an image file.");
                    return;
                }

                const validExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
                const minSize = 10 * 1024; // 10KB
                const maxSize = 2 * 1024 * 1024; // 2MB

                if (!validExtensions.includes(fileInput.type)) {
                    alert("Invalid file type. Please upload a JPEG or PNG image.");
                    $(this).val(''); // Clear the file input
                    return;
                }

                // Validate file size
                if (fileInput.size < minSize || fileInput.size > maxSize) {
                    alert("File size must be between 10KB and 2MB.");
                    $(this).val(''); // Clear the file input
                    return;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function() {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#profile_photo_upload').on('click', function(ev) {
                if ($('#profile_photo').val() === '') {
                    alert("Please select an image before uploading.");
                    return;
                }

                $(this).html('<span class="spinner-border text-light" role="status"></span> Uploading...'); // Show loading text
                $(this).prop('disabled', true); // Disable button during upload

                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(resp) {
                    $.ajax({
                        url: "{{ route('profilePhotoUpload') }}",
                        type: "POST",
                        data: {
                            "image": resp
                        },
                        success: function (data) {
                            if (data.status === 1) {
                                // Update profile photo preview
                                let html = `<div class="lg_profile_photo_prev"><img src="${data.image}" alt="Profile photo"></div>`;
                                $('#user_profile_photo').html(html);

                                // Reset button text and enable it
                                $('#profile_photo_upload').text('Done').prop('disabled', false);

                                // Reset input[type="file"] form
                                $("#profile_photo").val("");

                                // Close modal
                                $("#change_profile_photo_modal").modal("hide");

                                alert(data.message); // Show success message
                            } else {
                                alert(data.message); // Show error message
                            }
                        },
                        error: function (xhr) {
                            alert('An error occurred while uploading. Please try again.');
                            $('#profile_photo_upload').text('Done').prop('disabled', false);
                        },
                    });
                });
            });
        // }
    </script>
@endsection
