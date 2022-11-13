<section class="home">
    <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active"
                >
                <div class="carousel-caption d-md-block ">
                    <h1>1,000 Jobs Available in Tandag City</h1>
                    <p class="fs-5">When searching for a new job, you may use it as an opportunity to follow your
                        dream or pursue a specific passion.</p>
                    
                        <a href="joblist.php"><button style="background-color: #F7D716;" type="button"
                            class="btn btn-lg">Search for a job</button></a>
                </div>
            </div>
            <div class="carousel-item"
                >
                <div class="carousel-caption  d-md-block">
                    <h1>Get Your Dream Job Now</h1>
                    <p class="fs-5">Work hard with CONSISTENCY and DETERMINATION to earn the life that you DESESRVE
                    </p>
                    @can('guest')
                    <a style="background-color: #57D0B1;" class="btn btn-lg " href="{{ route('login') }}">Login Now</a>    
                    @endcan
                    
                </div>
            </div>
            <div class="carousel-item"
                >
                <div class="carousel-caption  d-md-block">
                    <h1>Your Dream Job is Waiting</h1>
                    <p class="fs-5">If OPPORTUNITY doesn't KNOCK, build a DOOR</p>
                    @can('guest')
                    <a href="{{ route('register') }}"><button style="background-color: #EC9B3B" type="button"
                        class="btn  btn-lg">Signup Now</button></a>     
                    @endcan
                   
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
