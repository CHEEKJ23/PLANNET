@extends('layout')
@section('content')
<head>
    <script>
        // display img
        function onClick(element) {
          document.getElementById("img01").src = element.src;
          document.getElementById("modal01").style.display = "block";
        }
      </script>

      <style>

      </style>
</head>
<section style="background-color:#e6eeff">
    <div class="container py-5">
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center" >
              <img src="{{asset('images/') }}/{{ Auth::user()->image }}" alt="avatar" class="rounded-circle img-fluid" style="width: 111px;height:111px" onclick="onClick(this)">
                
              <h5 class="my-3">{{ Auth::user()->name }} <a href="{{route('editProfile',['id'=>Auth::user()->id])}}" ><i class="fa-solid fa-pen-to-square"></i></a></h5>
              <p class="text-muted mb-1">ID:{{ Auth::user()->id }}</p>
            </div>
          </div>
          
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Account ID</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ Auth::user()->id }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Date Created</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ Auth::user()->created_at }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="row">
            <div class="col-md-">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-1" style="font-size: .77rem;">High Priority Task Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumHighPoint= 0 ?>
                      @foreach ($highTasks as $highTask)
      
                      <div hidden>{{ $highTask->point }}</div>
                      <?php $sumHighPoint += $highTask->point ?>
                                  
                      @endforeach
                      <p>{{ $sumHighPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">Medium Priority Task Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumMediumPoint= 0 ?>
                      @foreach ($mediumTasks as $mediumTask)
      
                      <div hidden>{{ $mediumTask->point }}</div>
                      <?php $sumMediumPoint += $mediumTask->point ?>
                                  
                      @endforeach
                      <p>{{ $sumMediumPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">Low Priority Task Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumLowPoint= 0 ?>
                      @foreach ($lowTasks as $lowTask)
      
                      <div hidden>{{ $lowTask->point }}</div>
                      <?php $sumLowPoint += $lowTask->point ?>
                                  
                      @endforeach
                      <p>{{ $sumLowPoint }}</p> 
                    
                  </div>
                  <hr>
                  <p class="mt-4 mb-1" style="font-size: .70rem;"> <strong>Total To-Do Task Point</strong> </p>
                  <div class="" style="height: 20px;">
                    <?php $sumAllPoint= 0 ?>
                      
                   
                    <p>{{ $sumAlltaskPoint = $sumHighPoint + $sumMediumPoint + $sumLowPoint }}</p> 
                  </div>
                </div>
              </div>
            </div>{{--  end --}}
            &nbsp;&nbsp;

            <div class="col-md-">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-1" style="font-size: .77rem;">January Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumjanPoint= 0 ?>
                      @foreach ($goals as $goal)
      
                      <div hidden>{{ $goal->point }}</div>
                      <?php $sumjanPoint += $goal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumjanPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">February Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumfebPoint= 0 ?>
                      @foreach ($febgoals as $febgoal)
      
                      <div hidden>{{ $febgoal->point }}</div>
                      <?php $sumfebPoint += $febgoal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumfebPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">March Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $summarPoint= 0 ?>
                      @foreach ($margoals as $margoal)
      
                      <div hidden>{{ $margoal->point }}</div>
                      <?php $summarPoint += $margoal->point ?>
                                  
                      @endforeach
                      <p>{{ $summarPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">April Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumaprPoint= 0 ?>
                      @foreach ($aprilgoals as $aprilgoal)
      
                      <div hidden>{{ $aprilgoal->point }}</div>
                      <?php $sumaprPoint += $aprilgoal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumaprPoint }}</p> 
                    
                  </div>
                  <br>
                </div>
              </div>
            </div>
            &nbsp;&nbsp;
            {{-- end --}}
            <div class="col-md-">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-1" style="font-size: .77rem;">May Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $summayPoint= 0 ?>
                      @foreach ($maygoals as $maygoal)
      
                      <div hidden>{{ $maygoal->point }}</div>
                      <?php $summayPoint += $maygoal->point ?>
                                  
                      @endforeach
                      <p>{{ $summayPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">June Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumjunePoint= 0 ?>
                      @foreach ($junegoals as $junegoal)
      
                      <div hidden>{{ $junegoal->point }}</div>
                      <?php $sumjunePoint += $junegoal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumjunePoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">July Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumjulyPoint= 0 ?>
                      @foreach ($julygoals as $julygoal)
      
                      <div hidden>{{ $julygoal->point }}</div>
                      <?php $sumjulyPoint += $julygoal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumjulyPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">August Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumaugPoint= 0 ?>
                      @foreach ($augoals as $augoal)
      
                      <div hidden>{{ $augoal->point }}</div>
                      <?php $sumaugPoint += $augoal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumaugPoint }}</p> 
                    
                  </div>
                  <br>
                </div>
              </div>
            </div>
            &nbsp;&nbsp;
            {{-- end --}}
            <div class="col-md-">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-1" style="font-size: .77rem;">SeptemberGoal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumsepPoint= 0 ?>
                      @foreach ($sepgoals as $sepgoal)
      
                      <div hidden>{{ $sepgoal->point }}</div>
                      <?php $sumsepPoint += $sepgoal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumsepPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">October Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumoctPoint= 0 ?>
                      @foreach ($ocgoals as $ocgoal)
      
                      <div hidden>{{ $ocgoal->point }}</div>
                      <?php $sumoctPoint += $ocgoal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumoctPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">November Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumnovPoint= 0 ?>
                      @foreach ($novgoals as $novgoal)
      
                      <div hidden>{{ $novgoal->point }}</div>
                      <?php $sumnovPoint += $novgoal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumnovPoint }}</p> 
                    
                  </div>
                  <br>
                  <p class="mb-1" style="font-size: .77rem;">December Goal Point</p>
                  <div class="" style="height: 20px;">
                    
                      <?php $sumdecPoint= 0 ?>
                      @foreach ($decgoals as $decgoal)
      
                      <div hidden>{{ $decgoal->point }}</div>
                      <?php $sumdecPoint += $decgoal->point ?>
                                  
                      @endforeach
                      <p>{{ $sumdecPoint }}</p> 
                    
                  </div>
                  <hr>
                  <p class="mt-4 mb-1" style="font-size: .60rem;"> <strong>Total Monthly Goal Point</strong> </p>
                  <div class="" style="height: 20px;">
                    <?php $sumAllgoalPoint= 0 ?>
                      
                   
                    <p>{{ $sumAllgoalPoint = $sumjanPoint + $sumfebPoint + $summarPoint + $sumaprPoint + $summayPoint + $sumjunePoint + $sumjulyPoint + $sumaugPoint + $sumsepPoint + $sumoctPoint + $sumnovPoint + $sumdecPoint }}</p> 
                  </div>
                </div>
              </div>
            </div>
            &nbsp;&nbsp;
            {{-- end --}}
            <div class="col-md-">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <div class="progress">
                    <? $sumPoint = 0 ?>
                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                    aria-valuenow="0px" aria-valuemin="0px" aria-valuemax="400px" style="width:{{ $sumPoint = $sumAllgoalPoint + $sumAlltaskPoint }}px; max-width: 390px;">
                    {{ $sumPoint }} point
                    </div>
                  </div>
                  <br>
                  
                  @if ($sumPoint >= 50 && $sumPoint <= 99)
                  <? $pointLeft = 0 ?>
                  <p style="margin-top：-10px; font-size: 14px; color:grey;">Keep Going ! You have {{ $pointLeft = 100 - $sumPoint }} points left to reach lv3</p>
                  
                  <img src="/images/level2.png" width="390" height="300" style="margin-top:-5%;" alt="lv2">

                  @elseif ($sumPoint >= 100 && $sumPoint <= 199)
                  <p style="margin-top：-10px; font-size: 14px; color:grey;">Keep Going ! You have {{ $pointLeft = 200 - $sumPoint }} points left to reach lv4</p>
                  <img src="/images/level3.png" width="390" height="300" style="margin-top:-5%;" alt="lv3">

                  @elseif ($sumPoint >= 200 && $sumPoint <= 299)
                  <p style="margin-top：-10px; font-size: 14px; color:grey;">Keep Going ! You have {{ $pointLeft = 300 - $sumPoint }} points left to reach lv5</p>
                  <img src="/images/level4.png" width="390" height="300" style="margin-top:-5%;" alt="lv4">

                  @elseif ($sumPoint >= 300 && $sumPoint <= 400 || $sumPoint > 400)
                  <p style="margin-top：-10px; font-size: 14px; color:grey;">Congratulations!! You have reached the max level.</p>
                  <img src="/images/level5.png" width="390" height="300" style="margin-top:-5%;" alt="lv5">

                  @else
                  <p style="margin-top：-10px; font-size: 14px; color:grey;">Keep Going ! You have {{ $pointLeft = 50 - $sumPoint }} points left to reach lv2</p> 
                  <img src="/images/level1.png" width="390" height="300" style="margin-top:-5%;" alt="l1">

                  @endif
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      
    </div>
  </section>
@endsection