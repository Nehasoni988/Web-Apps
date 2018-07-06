@section('top')
<nav class="navbar navbar-expand-sm " id="navbar">
    <div class="first">
        <h1 class="first-child">TODO<img src="/l.png" id="l">IST</h1>
    </div>
    <div class="second">
        <div class="second-sub">
                <form action='/todohome/search' method="post">
                {{ csrf_field() }}
                <i class="fa fa-search" id="search-image"></i>
                <input type="text" name="search" id="input" placeholder="WHAT YOU WANT TO SEARCH">  
                <button class="btn" id="button" onclick="return sea()">SEARCH</button>
            </form> 
        </div>    
    </div>
    <div class="third"><a href="/welcome" id="link">HOME</a></div>
    <div class="fourth"><a href="/todohome/help" title="Help"><i class="fa fa-question-circle" id="circle"></i></a></div>
    <div class="fifth"><a href="/todohome" title="List View"><button class="lg"><i class="fa fa-bars"></i></button></a></div>
    <div class="sixth"><a href="/todohome/grid" title="Grid View"><button class="lg"><i class="fa fa-th-large"></i></button></a></div>
</nav>
@endsection
@section('content')
<div class="container-fluid">
    <div class="buttons">  
        <div class="btn-group">
            <a href="/form"><button type="button" class="btn" id="btn"><i class="fa fa-plus-square" id="menu1"></i>ADD TO-DO TASK</button></a>
            <!-- First Dropdown -->
            <div class="btn-group"> 
                    <button type="button" id="btn" class="btn  dropdown-toggle" data-toggle="dropdown"><i class="fa fa-spinner"
                    id="menu1"></i>
                    MANAGE TASK
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/todohome/bytitle" id="drop"><i class="fa fa fa-circle-o red"></i><b class="slide">By Title</b></a>
                        <a class="dropdown-item" href="/todohome/bydate" id="drop"><i class="fa fa fa-circle-o green"></i><b class="slide">By Date</b></a>
                        <a class="dropdown-item" href="/todohome/clear" id="drop" onclick="return cl()"><i class="fa fa fa-circle-o pink"></i><b class="slide">Clear All</b></a>
                    </div>
            </div> 
            <!-- End First Dropdown  -->
            <a href="/todohome"><button type="button" class="btn " id="btn"><i class="fa fa-folder" id="menu1"></i>INBOX</button></a>
            <!-- Second Dropdown -->
            <div class="btn-group">
                <button type="button" id="btn" class="btn  dropdown-toggle" data-toggle="dropdown"><i class="fa fa-dedent"
                 id="menu1"></i>
                Category
                </button>
                <div class="dropdown-menu">
                   <a class="dropdown-item" href="/todohome/new" id="drop"><i class="fa fa fa-circle-o red"></i><b class="slide">New Task</b></a>
                    <a class="dropdown-item" href="/todohome/old" id="drop"><i class="fa fa fa-circle-o pink"></i><b class="slide">Old Task</b></a>
                    <a class="dropdown-item" href="/todohome/recent" id="drop"><i class="fa fa fa-circle-o yellow"></i><b class="slide">Recent Task</b></a> 
                </div>    
             </div>
             <!--End Second Dropdown -->

        </div>
    </div>  
</div>   
@endsection
