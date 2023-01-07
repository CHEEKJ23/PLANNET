@extends('layout')
@section('content')
<head>
  <style>
    section {
      padding: 70px;
    }
      
    .contact-page-sec .contact-page-form h2 {
    color: #071c34;
    font-size: 22px;
    font-weight: 700;
    }
    .contact-page-form .col-md-6.col-sm-6.col-xs-12 {
    padding-left: 0;
    }  
    .contact-page-form.contact-form input {
    margin-bottom: 5px;
    }  
    .contact-page-form.contact-form textarea {
    height: 110px;
    }
    .contact-page-form.contact-form input[type="submit"] {
    background: #071c34;
    width: 150px;
    border-color: #071c34;
    }
    
    .contact-page-form input {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #f9f9f9;
    margin-bottom: 20px;
    padding: 12px 16px;
    width: 100%;
    border-radius: 4px;
    }

    .single-input-field textarea {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #f9f9f9;
    width: 100%;
    height: 120px;
    padding: 12px 16px;
    border-radius: 4px;
    }
    .single-input-fieldsbtn input[type="submit"] {
    background: #6D7993 none repeat scroll 0 0;
    color: #fff;
    display: inline-block;
    font-weight: 600;
    padding: 10px 0;
    text-transform: capitalize;
    width: 150px;
    margin-top: 50px;
    margin-left: 280px;
    font-size: 16px;
    }
    .single-input-fieldsbtn input[type="submit"]:hover{
      background:#071c34;transition: all 0.4s ease-in-out 0s;border-color:#071c34
    }
      
  </style>
</head>
@if (session('status'))
<div class="alert alert-success">
    <p class="msg text-center"> {{ session('status') }}</p>
</div>
@endif
<div>
  <section class="contact-page-sec">
  <div class="container">
    <div class="row">
        <div class="col-md-8">
          <div class="contact-page-form" method="post">
            <h1 class="text-left">Send Us Feedback</h1> 
            <form action="{{route('addFeedback')}}" method="post" enctype="multipart/form-data"> @csrf
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="single-input-field">
                    <input type="text" placeholder="Name" class="form-control" name="fname" required/>
                  </div>
                </div>  
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="single-input-field">
                    <input type="email" placeholder="E-mail" class="form-control" name="femail" required/>
                  </div>
                </div>                              
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="single-input-field">
                    <input type="text" placeholder="Subject" class="form-control" name="fsubject" required/>
                  </div>
                </div>                
                <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="single-input-field">
                    <textarea  placeholder="Write Your Message" class="form-control" name="fmessage" required></textarea>
                  </div>
                </div>                                                
                <div class="single-input-fieldsbtn">
                  <input type="submit" value="Submit"/>
                </div>                          
              </div>
            </form> 
          </div>      
        </div>    
        <div class="col-md-4">
          <img src="/images/Contact us.png" width="500" height="500" style="margin-top:-5%;" alt="contactUs">
        </div>  
      </div>
    </div>
  </section>
</div>
<script>
  $(document).ready(function(){
      $('.alert-success').fadeIn().delay(5000).fadeOut();
        });
  </script>
@endsection
