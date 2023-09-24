@extends('layouts.app')

@section('content')
<div class="d-flex p-2 m-2 bg-danger bg-gradient text-light font-weight-bold justify-content-center h-100"
    style="font: weight 500px;;">
    <h2>Contact Us</h2>
</div>
<div class="container">
    <div class="row pt-3 fs-4">
        <div class="col-6">
            <div class="card p-3">
                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
                @endif
                <form action="/contact/guest" enctype="multipart/form-data" method="get">
                    @csrf
                    <div class="form-group d-flex flex-row justify-content-center pb-3">
                        <label class="control-label col-sm-2" for="senderName">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="senderName" placeholder="Enter your name"
                                name="senderName" required>
                        </div>
                    </div>
                    <div class="form-group d-flex flex-row justify-content-center pb-3">
                        <label class="control-label col-sm-2" for="senderEmail">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="senderEmail" placeholder="Enter your email"
                                name="senderEmail" required>
                        </div>
                    </div>
                    <div class="form-group d-flex flex-row justify-content-center pb-3">
                        <label class="control-label col-sm-2" for="subject">Subject:</label>
                        <div class="col-sm-10">
                            <input type="subject" class="form-control" id="subject" placeholder="Enter contact subject"
                                name="subject" required>
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleFormControlTextarea1">Enter Your Message: </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="12"
                            name="text" required></textarea>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="card p-3">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.697322363565!2d89.25787101501996!3d25.714443683658164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e32d9bf4247893%3A0x9d518477e1d19836!2sDept.%20of%20CSE%2C%20Begum%20Rokeya%20University%2C%20Rangpur!5e0!3m2!1sen!2sbd!4v1656490911113!5m2!1sen!2sbd"
                    width="515" height="525" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-6 pt-5">
            <div class="card p-5">
                <h3> Our Address:</h3>
                <hr>
                <h5>2nd Floor, Academic Building 2</h5>
                <h5> Begum Rokeya University,Ranpugr</h5>
                <h5>Rangpur-5400, Bangladesh</h5>
                <br>
                <h4>Telephone</h4>
                <h5>++8801670000000</h5>
                <br>
                <h4>Email:</h4>

                <h5>cse@brur.ac.bd</h5>
            </div>
        </div>
    </div>
</div>
<style type="text/css">

</style>
@endsection