@extends('layout')
@section('content')
<head>
    <style>
        
		.about-section{
			position:relative;
			padding:50px 0px;
		}

		.about-section .content-column{
			position:relative;
			margin-bottom:40px;
		}

		.about-section .content-column .inner-column{
			position:relative;
			padding-top:50px;
			padding-right:100px;
		}

		.about-section .content-column .text{
			position:relative;
			color:#777777;
			font-size:15px;
			line-height:2em;
			margin-bottom:40px;
		}

		.about-section .content-column .email{
			position:relative;
			color:#252525;
			font-weight:700;
			margin-bottom:50px;
		}

		.about-section .image-column{
			position:relative;
			margin-bottom:50px;
		}

		.about-section .image-column .inner-column{
			position:relative;
			padding:40px 40px 0px 0px;
			margin-left:50px;
		}

		.about-section .image-column .inner-column:after{
			position:absolute;
			content:'';
			right:0px;
			top:0px;
			left:40px;
			bottom:100px;
			z-index:-1;
			border:2px solid #964a78;
		}

		.about-section .image-column .inner-column .image{
			position:relative;
		}

		.about-section .image-column .inner-column .image:before{
			position:absolute;
			content:'';
			left:-50px;
			bottom:-50px;
			width:299px;
			height:299px;
			background:url(img/pattern-2.png) no-repeat;
		}

		.about-section .image-column .inner-column .image img{
			position:relative;
			width:100%;
			display:block;
		}

		.about-section .image-column .inner-column .image .overlay-box{
			position:absolute;
			left:40px;
			bottom:48px;
		}
		.sec-title {
			position: relative;
			padding-bottom: 40px;
		}
		.sec-title h2{
			color: #964a78;
		}
		.sec-title .title {
			position: relative;
			color: #9099a2;
			font-size: 18px;
			font-weight: 700;
			padding-right: 50px;
			margin-bottom: 15px;
			display: inline-block;
			text-transform: capitalize;
		}
		.sec-title .title:before {
			position: absolute;
			content: '';
			right: 0px;
			bottom: 7px;
			width: 40px;
			height: 1px;
			background-color: #bbbbbb;
		}

		.text-info {
        display: inline-block;
        width: 80%;
        text-align: center;
        margin-top: 100px;
        margin-bottom: 150px;
        margin-left: 120px;
        }

        .text-info span {
        color: black;
        font-size: 16px;
        font-weight: ;
        display: inline-block;
        width: 80%;
        }
        
        .text-info h2 {
        color: black;
        font-weight: 600;
        margin-bottom: 10px;
        }

		.team{
		margin-top:140px;
		}

		.team h1, .team h4{
			color: #964a78;
		}

		.team-member {
		margin: 15px 0;
		padding: 0;
		}

		.team-member img {
		position: relative;
		overflow: hidden;
		padding: 0;
		margin: 0;
		width: 200px;
		height: 200px;
		}

		.team-member h4 {
		margin: 10px 0 0;
		padding: 0;
		}

    </style>
</head>

<section class="about-section">
    	<div class="container">
        	<div class="row clearfix">
            	
                <!--Content Column-->
                <div class="content-column col-md-6 col-sm-12 col-xs-12">
                	<div class="inner-column">
                    	<div class="sec-title">
                    		<div class="title">PLANNET</div>
                        	<h2>About Us</h2>
                        </div>
                        <div class="text">As people's lives are getting busier nowadays, it is easy to forget some important events. 
A web application which people can use as a productivity & efficiency-improving tool to improve their efficiency in life is proposed.
The main goal is to keep the users away from the forgetfulness issues and remind the users of their daily affairs. </div>
                        <div class="email">Find Us: <span class="theme_color">D210061A@sc.edu.my</span></div>
                        
                    </div>
                </div>
                
                <!--Image Column-->
                <div class="image-column col-md-6 col-sm-12 col-xs-12">
                	<div class="inner-column " data-wow-delay="0ms" data-wow-duration="1500ms">
                    	<div class="image">
                        	<img src="https://st2.depositphotos.com/3591429/11211/i/600/depositphotos_112117774-stock-photo-man-using-tablet.jpg" alt="">
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

		<div class="row">
			<div class="col-md-8">
				<div class="text-info">
					<h2>Features</h2>
					<span>Whatever event you are planning, you can make it a reality. </span> 
					<span>A goal without a plan is not very meaningful and a plan is a gas pedal to reach your goal of success.</span> 
				</div>          
			</div>
			<div class="col-md-4">
			<img src="/images/Timeline.png" width="400" height="400" style="margin-top:-5%;" alt="timeline">

			</div>          
    	</div>

		<!-- Feautures -->
		<div class="container mt-5">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="view overlay rounded z-depth-2">
						<img class="img-fluid" src="https://media.istockphoto.com/photos/to-do-list-text-on-notepad-picture-id1285308242?k=20&m=1285308242&s=612x612&w=0&h=KS0e8XeicpKkm1A_JTySP2pXKxiW0UnGLdOmKwHMEOc=" alt="todo">
					</div>

				</div>
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-6">
					<h4 class="font-weight-bold mb-3"><strong>To-do List</strong></h4>

					<p>When there are numerous tasks, you must have your own task list, a dynamic record of each task's progress, which should not be difficult for you to understand and avoid task from being overlooked.</p>

					<a class="btn btn-outline-info" href="todolist" role="button">Try it now!</a>
				</div>
			</div>
		</div>
		
		<div class="container mt-5">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<h4 class="font-weight-bold mb-3 red-text"><strong>Daily Expenses</strong></h4>

					<p>How much money a person can accumulate in his life, not depending on how much money he can earn, but depends on how he invests his money, people looking for money is better than money looking for money, to know that let the money work for you, not you work for money.</p>

					<a class="btn btn-outline-info" href="dailyExpenses" role="button">Try it now!</a>
				</div>

				<div class="col-lg-1">&nbsp;</div>

				<div class="col-lg-5">
					<div class="view overlay rounded z-depth-2">
						<img class="img-fluid" src="https://qph.cf2.quoracdn.net/main-qimg-11207df00784842b053d6b1853fd8b86-lq" alt="expenses" >
					</div>
				</div>
			</div>
		</div>

		<div class="container mt-5">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="view overlay rounded z-depth-2">
						<img class="img-fluid" src="https://www.onelastfrog.com/wp-content/uploads/2021/12/stil-flRm0z3MEoA-unsplash.jpg" alt="scheduler">
					</div>

				</div>

				<div class="col-lg-1">&nbsp;</div>

				<div class="col-lg-6">
					<h4 class="font-weight-bold mb-3"><strong>Event Scheduler</strong></h4>

					<p>Prioritizing your work is a smart way to be productive throughout the day. Before the day officially starts, make a realistic assessment of what needs to be done and how much time it will take. Get this in order so you know what needs to be done first and why, and have a general idea of when to do which tasks.</p>
					
					<a class="btn btn-outline-info" href="/" role="button">Try it now!</a>
				</div>
			</div>
		</div>


    </section>

	
@endsection