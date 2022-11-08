@extends('layouts.post')

@section('content')
  <section style="position: relative" class="home-page pt-4">
   
    <div class="container">
      <form action="{{route('job.index')}}">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="px-4">
              <div class="rounded-text">
                <p>
                  Start your journey by searching a job
                </p>
              </div>
              <div class="home-search-bar">
                  <input type="text" name="q" placeholder="Search Job By Title" class="home-search-input form-control">
                  <button type="submit" class="secondary-btn"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="py-5 px-5 text-center">
              <div class="text-light">
                <h4>When searching for a new job, you may use it as an opportunity to follow your
                        dream or pursue a specific passion.
              </h4>
              </div>
            </div>
            </div>
        </div>   
      </form>
    </div>
  </section>
  
  {{-- jobs list --}}
  <section style="background:#ffff" class="jobs-section py-5">
    <div class="container-fluid px-0">
      <div class="row ">
        <div class="col-sm-12 col-md-7 ml-auto">
          <div class="card">
            <div style="background: #c7ecee" class="card-header">
              <p class="card-title font-weight-bold"></i> Top jobs</p>
            </div>
            <div class="card-background card-body">
              <div class="top-jobs" >
                <div class="row">

                  @foreach ($posts as $post)
                    @if ($post->company)
                    <div style="background: #ffff;" class="col-sm-6 col-md-6 col-lg-4 col-sm-6 mb-sm-3">
                      <a href="{{route('post.show',['job'=>$post->id])}}">
                      <div class="job-item border row h-100">
                        <div class="col-xs-3 col-sm-4 col-md-5">
                          <img src="{{asset($post->company->logo)}}" alt="job listings" class="img-fluid p-2">
                        </div>
                        <div class="job-description col-xs-9 col-sm-8 col-md-7">
                        <p class="company-name" title="{{$post->company->title}}">{{$post->company->title}}</p>
                          <ul class="company-listings">
                            <li>•{{substr($post->job_title, 0, 27)}}</li>
                        </ul>
                        </div>
                      </div>
                      </a>
                    </div>
                    @endif
                  @endforeach

                 </div>
               </div>
              </div>
              <a class="btn secondary-btn" href="{{route('job.index')}}">Show all jobs</a>
            </div>
            <div class="mt-2 rounded border-dark">
              <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31519.738913165434!2d126.16591590644893!3d9.06673763375241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3302373d1fdee1bf%3A0x9f84ea6460e30dd3!2sTandag%2C%20Surigao%20del%20Sur!5e0!3m2!1sen!2sph!4v1667286394349!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

       
        <div class="col-sm-12 col-md-3 mr-auto">

          <div class="card mb-4">
            <div style="background: #c7ecee" class="card-header">
              <p class="font-weight-bold"></i> Top Employers</p>
            </div>
            <div class="card-body">
              <div class="top-employers">
              @foreach ($topEmployers as $employer)
                <div class="top-employer">
                  <a href="{{route('account.employer',['employer'=>$employer])}}">
                    <img src="{{asset($employer->logo)}}" width="60px" class="img-fluid" alt="">
                  </a>
                </div> 
              @endforeach
              </div>
            </div>
          </div>

            <div class="card mb-4 job-by-category">
              <div style="background: #c7ecee" class="card-header">
                <p class="font-weight-bold"> Jobs By Category</p>
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

