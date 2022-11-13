@extends('layouts.post')

@section('content')
<section>
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/banner/banner-tandag.jpg') }}" class="d-block w-100" alt="..." style="max-width: 100%; height: 300px">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/banner/boulevard.jpg') }}" class="d-block w-100" alt="..." style="max-width: 100%; height: 300px">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/banner/TandagBoulevard.jpg') }}" class="d-block w-100" alt="..." style="max-width: 100%; height: 300px">
      </div>
    </div>
  </div>
</section>
  <section style="position: relative" class="home-page pt-4">
   
    <div class="container">
      <form action="{{route('job.index')}}">
        <div style="padding-bottom:25px;"class="row justify-content-center rounded head-banner shadow-lg">
          <div class="col-sm-12 col-md-6 ">
            <div class="px-4">
              <div class="rounded-text">
                <p>
                  Start your journey by searching a job
                </p>
              </div>
              <div class="home-search-bar">
                  <input type="text" name="q" placeholder="Search Job By Title" class="home-search-input form-control border">
                  <button type="submit" class="secondary-btn"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>   
      </form>
    </div>
  </section>
  
  {{-- jobs list --}}
  <section style="background:#f1f2f6; margin-top:50px" class=" mt-5 jobs-section py-5">
    <div class="container-fluid px-0">
      <div class="row ">
        <div class="col-sm-12 col-md-7 ml-auto">
          <div class="card">
            <h3 class="h3 text-center text-dark" id="pageHeaderTitle">Start looking for a job here</h3>

            <div class="card-background bg-transparent card-body">
              <div class="top-jobs" >
                <div class="row">
              @foreach ($posts as $post)
                  <div class="col-md-4">
                    <a href="{{route('post.show',['job'=>$post->id])}}">
            <div class="card card2 p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"><img class="rounded-circle" width="45px" src="{{asset($post->company->logo)}}" alt=""> </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">{{ $post->company->title }}</h6>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <h6>{{ $post->job_level }}</h6><br><h3>{{ $post->job_title }}</h3>
                    <div class="badge">Offer Salary(Monthly) <br><h6>{{$post->salary}}</h6></div>
                    <div class="mt-2">
                        <div class="mt-3"> <span class="text1">No of vacancy(s): {{$post->vacancy_count}} |<span class="text-danger"> Apply Before: {{date('d',$post->remainingDays())}} days</span></span> </div>
                    </div>
                </div>
            </div>
          </a>
        </div>
        @endforeach

                 </div>
                
               </div>
              </div>
              <a class="btn secondary-btn" href="{{route('job.index')}}">Show all jobs</a>
            </div>
            
            <section class="light">
              <div class="container py-2">
                <div class="h1 text-center text-dark" id="pageHeaderTitle">TOP EMPLOYERS</div>
                @foreach ($topEmployers as $employer)
            
                <article class="postcard light blue">
                  <a class="postcard__img_link" href="{{ route('account.employer', ['employer' => $employer]) }}">
                    <img class="postcard__img" src="{{asset($employer->cover_img)}}" alt="Company cover image" />
                  </a>
                  <div class="postcard__text t-dark">
                    <h1 class="postcard__title blue"><a href="#">{{ $employer->title }}</a></h1>
                    <div class="postcard__subtitle small">
                      <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>{{ $employer->updated_at }}
                      </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">{{ $employer->description }}</div>
                    <ul class="postcard__tagbox">
                      <li class="tag__item"><i class="fas fa-tag mr-2"></i><a href="{{ route('account.employer', ['employer' => $employer]) }}">View Company</a></li>
                      <li class="tag__item"><a class="d-block" target="_blank" href="{{$employer->website}}"><i class="fas fa-globe"></i> Visit their website</a></li>
                      
                    </ul>
                  </div>
                </article>
            @endforeach  
              </div>
            </section>
          </div>
          

       
        <div class="col-sm-12 col-md-3 mr-auto">
          <div class="overflow-hidden card mb-4 rounded border-dark">
            <div style="background: #c7ecee" class="card-header">
              <p class="font-weight-bold">Tandag Map</p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15759.6235454436!2d126.18660453684134!3d9.072338308835286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3302373d1fdee1bf%3A0x9f84ea6460e30dd3!2sTandag%2C%20Surigao%20del%20Sur!5e0!3m2!1sen!2sph!4v1668257129469!5m2!1sen!2sph" width="375" height="360" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>  

            <div class="card mb-4 job-by-category">
              <div style="background: #c7ecee" class="card-header">
                <p class="font-weight-bold"> Job Category</p>
              </div>
              <div class="card-body">
                <div class="jobs-category mb-3 mt-0">
                  @foreach ($categories as $category)
                  <div class="hover-shadow p-1"><a href="{{URL::to('search?category_id='.$category->id)}}" class="text-muted">{{$category->category_name}}</a> </div>
                  @endforeach
                  <a class="p-1 text-info" href="{{route('job.index')}}">More..</a>
                </div>
              </div>
            </div>
             
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

