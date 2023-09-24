@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-3">
                <div class="row">
                    <h1>Edit profile</h1>
                </div>
                <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label">Title</label>

                                
            <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" title="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>

        @error('title')
                <strong>{{ $message }}</strong>
        
        @enderror
                                           
        <label for="title" class="col-md-4 col-form-label">Title</label>

                                
                                        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" title="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>

                                        @error('title')
                                                <strong>{{ $message }}</strong>
                                           
                                        @enderror
                                    
                </div>
                <div class="row mb-3">
                                    <label for="description" class="col-md-4 col-form-label">Description</label>

                                
                                        <input id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror" description="description" value="{{ old('description') ?? $user->profile->description }}"  autocomplete="description" autofocus>

                                        @error('description')
                                                <strong>{{ $message }}</strong>
                                           
                                        @enderror
                                    
                </div>
                <div class="row mb-3">
                                    <label for="url" class="col-md-4 col-form-label">Url</label>

                                
                                        <input id="url" name="url" type="text" class="form-control @error('url') is-invalid @enderror" url="url" value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" autofocus>

                                        @error('url')
                                                <strong>{{ $message }}</strong>
                                           
                                        @enderror
                                    
                </div>
                <div class="row mb-3">
                                    <label for="image" class="col-md-4 col-form-label">Profile image</label>

                                
                                        <input id="image" name="image" type="file" class="form-control-file form-control @error('image') is-invalid @enderror" image="image" value="{{ old('image') }}"  autocomplete="image" autofocus>

                                        @error('image')
                                                <strong>{{ $message }}</strong>
                                           
                                        @enderror
                                    
                </div>
                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
        
    </form> -->

    <!-- BEGIN FORM-->
    <form name="memberForm" method="post" action="/profile/{{$user->id}}" class="formClass"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-body">
            <div class="row">
                <h1>Edit profile</h1>
            </div>
            <div class="col-md-12 center">

                <!--   <h3>Feel free to call <b>01847291963</b>, <b>01847291952</b> if you face any problem regarding Membership Application.</h3> -->

                <br>
            </div>


            <div class="row">
                <div class="col-md-9">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Name <span class="required" aria-required="true"> *
                                    </span></label>
                                <input type="text" value="{{ old('title') ?? $user->name }}" name="name" name="name"
                                    class="form-control" id="last_name_bng" aria-required="true" aria-invalid="false"
                                    aria-describedby="name_bng-error">
                                <span id="" class=""></span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label"> Designation
                                    <span class="required" aria-required="true"> * </span></label>
                                <input type="text" name="title" value="{{ old('title') ?? $user->profile->title }}"
                                    class="form-control" id="title" aria-required="true" aria-invalid="false"
                                    title="title" aria-describedby="name_bng-error"><span id="" class=""></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label class="control-label">User name <span class="required" aria-required="true"> *
                                    </span></label>
                                <div id="useravailability" style="display:inline; color: red;"></div>
                                <input type="text" name="username" value="{{ old('title') ?? $user->username }}"
                                    class="form-control" id="user_name_bng" aria-required="true" aria-invalid="false"
                                    username="username" aria-describedby="name_bng-error"><span id="" class=""></span>
                            </div>
                        </div>


                        <!-- <div class="col-md-4">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label"> Password <span
                                                                            class="required"
                                                                            aria-required="true"> * </span></label>
                                                                    <input type="password" name="password" id="mainPassword"
                                                                           placeholder="password " class="form-control"
                                                                           aria-required="true"
                                                                           aria-invalid="false"

                                                                           aria-describedby="name_bng-error"><span
                                                                        id=""
                                                                        class=""></span>
                                                                </div>
                                                            </div> -->

                        <!-- <div class="col-md-4">
                                                                <div class="form-group has-success">
                                                                    <label class="control-label"> Re-enter password
                                                                        <span
                                                                                class="required"
                                                                                aria-required="true"> * </span></label>
                                                                    <input type="password" name="repassword"
                                                                           placeholder="Re-enter password"
                                                                           class="form-control"
                                                                        

                                                                           aria-required="true"
                                                                           aria-invalid="false"
                                                                           aria-describedby="name_bng-error"><span
                                                                        id=""
                                                                        class=""></span>
                                                                </div>
                                                            </div> -->


                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-success">
                                <label class="control-label">Email <span class="required" aria-required="true"> *
                                    </span> </label>
                                <div id="availability" style="display:inline; color: red;"></div><input type="text"
                                    name="email" email="email" value="{{ old('title') ?? $user->email }}"
                                    class="form-control" id="mail" aria-required="true" aria-invalid="false"
                                    onBlur="checkAvailability()" aria-describedby="name_bng-error">
                                <span class="help-block">

                                </span>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-success">
                                <label class="control-label">Social Media <span class="required" aria-required="true"> *
                                    </span> </label>
                                <div id="availability" style="display:inline; color: red;"></div><input type="text"
                                    name="url" url="url" value="{{ old('title') ?? $user->profile->url }}"
                                    class="form-control" id="url" aria-required="true" aria-invalid="false"
                                    onBlur="checkAvailability()" aria-describedby="name_bng-error">
                                <span class="help-block">

                                </span>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-3">
                    <div class=" form-group has-success">

                        <div class="  fileinput fileinput-new" data-provides="fileinput">
                            <label class="control-label">Photo <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="form-control fileinput-new thumbnail" style="width: 200px; height: 150px;">

                                <img alt="Profile Photo" class="img-responsive" src="{{$user->profile->profileImage()}}"
                                    style="width: 200px; height: 150px;">

                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"
                                style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                            <div>
                                < <label for="image" class="col-md-4 col-form-label">Profile image</label>


                                    <input id="image" name="image" type="file"
                                        class="form-control-file form-control @error('image') is-invalid @enderror"
                                        image="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                                    @error('image')
                                    <strong>{{ $message }}</strong>

                                    @enderror

                            </div>
                        </div>

                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-success">
                        <label class="control-label">Date of Birth (mm/dd/yyyy) <span class="required"
                                aria-required="true"> * </span></label>
                        <input type="text" name="dob" placeholder="Date of Birth" id="datepicker" class="form-control"
                            aria-required="true" aria-invalid="false" dob="dob"
                            value="{{ old('title') ?? $user->profile->dob }}" aria-describedby="name_bng-error"><span
                            id="" class=""></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-group has-success">
                        <label class="control-label"> Gender : <span class="required" aria-required="true"> *
                            </span></label>


                        <div class="mt-radio-inline">
                            <label class="mt-radio">
                                <input type="radio" name="gender" id="optionsRadios25" value="1" checked=""
                                    gender="gender"> F
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                <input type="radio" name="gender" id="optionsRadios26" value="M" checked=""
                                    gender="gender"> M
                                <span></span>
                            </label>
                        </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group has-success">
                        <label class="control-label">Blood Group


                        </label>

                        <select name="bloodGroup" bloodGroup="bloodGroup" class="form-control">
                            <option value="" selected="selected">Select Blood Group</option>
                            <option value="opositive">O+</option>
                            <option value="onegative">O-</option>
                            <option value="apositive">A+</option>
                            <option value="anegative">A-</option>
                            <option value="bpositive">B+</option>
                            <option value="bnegative">B-</option>
                            <option value="abpositive">AB+</option>
                            <option value="abnegative">AB-</option>
                        </select>



                        <span id="" class=""></span>
                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-success">
                        <label class="control-label">Father's Name <span class="required" aria-required="true"> *
                            </span></label>
                        <input type="text" name="fatherName" fatherName="fatherName" placeholder="Father's name"
                            class="form-control" aria-required="true" aria-invalid="false"
                            value="{{ old('title') ?? $user->profile->fatherName }}"
                            aria-describedby="name_bng-error"><span id="" class=""></span>
                    </div>
                </div>
            </div>






            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-success">
                        <label class="control-label">Mother's Name <span class="required" aria-required="true"> *
                            </span></label>
                        <input type="text" name="motherName" motherName="motherName" placeholder="Mother's name"
                            class="form-control" aria-required="true" aria-invalid="false"
                            value="{{ old('title') ?? $user->profile->motherName }}"
                            aria-describedby="name_bng-error"><span id="" class=""></span>
                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-success">
                        <label class="control-label">Batch <span class="required" aria-required="true"> *
                            </span></label>


                        <input type="number" step="1" name="batch" batch="batch" placeholder="Batch"
                            class="form-control" aria-required="true" aria-invalid="false"
                            value="{{ old('title') ?? $user->profile->batch }}" aria-describedby="name_bng-error"><span
                            id="" class="">

                            <span id="" class=""></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group has-success">
                        <label class="control-label"> Year of Graduation <span class="required" aria-required="true"> *
                            </span></label>


                        <input type="number" id="yog" yog="yog" name="yog"
                            value="{{ old('title') ?? $user->profile->yog }}" class="form-control"
                            name="yearOfGraduation" min="1900" max="2099" step="1" />


                        <span id="" class=""></span>




                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group has-success">
                        <label class="control-label"> Degree <span class="required" aria-required="true"> *
                            </span></label>


                        <select name="degree" degree="degree" class="form-control">
                            <option value="">Select Degree</option>
                            <option value="bsc">BSc</option>
                            <option value="msc">MSc</option>
                            <option value="phd">Phd</option>
                        </select>



                        <span id="" class=""></span>



                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-success">
                        <label class="control-label">Session<span class="required" aria-required="true"> *
                            </span></label>


                        <input type="text" name="session" session="session" placeholder="Session" class="form-control"
                            aria-required="true" aria-invalid="false"
                            value="{{ old('title') ?? $user->profile->session }}" aria-describedby="name_bng-error">




                        <span id="" class=""></span>
                    </div>
                </div>
            </div>


            <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Present Position (If retd. last
                                                                position) <span class="required"
                                                                                aria-required="true"> </span></label>
                                                            <input type="text" name="presentPosition"
                                                                   placeholder="Present Position" class="form-control"
                                                                   aria-required="true"
                                                                   aria-invalid="false"
                                                                   aria-describedby="name_bng-error"><span
                                                                id=""
                                                                class=""></span>
                                                        </div>
                                                    </div>
                                                </div> -->



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-success">
                        <label class="control-label" for="district">Contact Address<span class="required"
                                aria-required="true"> * </span></label>
                        <input type="text" name="address" address="address" placeholder="Address" class="form-control"
                            aria-required="true" aria-invalid="false"
                            value="{{ old('title') ?? $user->profile->address }}" aria-describedby="name_bng-error">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-success">
                            <label class="control-label">Telephone <span class="required" aria-required="true"> *
                                </span></label>
                            <div id="telephone_mobile_avaialbility" style="display:inline; color: red;"></div>
                            <input type="text" name="mobile" mobile="mobile"
                                value="{{ old('title') ?? $user->profile->mobile }}" class="form-control"
                                aria-required="true" aria-invalid="false" aria-describedby="name_bng-error">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group has-success">
                            <label class="control-label">Professional Information:
                                Briefly state specialty/expertise area and
                                experience (optional) </label>
                            <textarea name="description" class="form-control" rows="3" name="name_eng"
                                placeholder="Professional Information" class="form-control" description="description"
                                value="{{ old('title') ?? $user->profile->description }}" aria-required="true"
                                aria-invalid="false" aria-describedby="name_bng-error"> </textarea>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group has-success">
                            <label class="control-label">Membership Fee</label>
                            <div name="name_bng" class="form-control" aria-required="true" aria-invalid="false"
                                aria-describedby="name_bng-error">


                                <!--                                                                 <span id="name_bng-error" -->
                                <!--                                                                       class="help-block help-block-error"></span> -->


                                <div class="pull-left"> Life Member/Associate Life
                                    Member
                                </div>


                                <div class="pull-right"> Tk 2,000</div>
                            </div>

                        </div>
                    </div>
                </div>
                <input type="hidden" name="membership_number" placeholder="Membership Number" class="form-control"
                    aria-required="true" aria-invalid="false" aria-describedby="name_bng-error"><span id=""
                    class=""></span>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group has-success">


                            <label class="control-label">Declaration

                                <span style="display:inline;" class="" aria-required="true"> * </span>
                            </label>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <input type="checkbox" value="1" name="term" id="name_bn" aria-required="true"
                                        aria-describedby="name_bng-error" required>
                                    <h4 style="display: inline;"><b> I hereby declare that, as a Life Member/Associate
                                            Life Member, I shall abide by the rules and
                                            regulations of CSE, BRUR Alumni and support its
                                            activities that will help achieve its objectives. </b></h4>

                                </div>



                            </div>
                        </div>
                    </div>



                    <!--/row-->


                    <!--/span-->

                </div>



                <!--/start: select role row-->

                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-5 col-md-6">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-success">Clear</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <!-- search and navigation control -->
</div>
<!--  end of main part content -->
</div>
<!-- main part2-->
</div>

<!-- END FORM-->
</div>
@endsection