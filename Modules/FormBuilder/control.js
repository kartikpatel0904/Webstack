var control =[
    {
      name:'COL2',
      initialvalue:0,
      id:this.name + this.initialvalue,
      html: '<div style="clear:both;height:30px;" id="col2" class="control col-md-2" ></div>',
      gethtml : function () {
        this.initialvalue=+1;
        return this.html;
    }
    },
    {
        name:'COL3',
        initialvalue:0,
        id:this.name + this.initialvalue,
        html: '<div  style="clear:both;height:30px;" class="control col-md-3" id=${this.id}></div>',
        gethtml : function () {
          this.initialvalue=+1;
          return this.html;
      }
      },
      {
        name:'COL4',
        initialvalue:0,
        id:this.name + this.initialvalue,
        html: '<div style="clear:both;height:30px;" class="control col-md-4" id='+this.id+'"></div>',
        gethtml : function () {
          this.initialvalue=+1;
          return this.html;
      }
      },
      {
        name:'COL6',
        initialvalue:0,
        id:this.name + this.initialvalue,
        html: '<div style="clear:both;height:30px;" class="control col-md-6" id='+this.id+'"></div>',
        gethtml : function () {
          this.initialvalue=+1;
          return this.html;
      }
      },
      {
        name:'COL12',
        initialvalue:0,
        id:this.name + this.initialvalue,
        html: '<div  style="clear:both;height:30px;" class="control col-md-12" id='+this.id+'"></div>',
        gethtml : function () {
          this.initialvalue=+1;
          return this.html;
      }
      },
    {
        name:'ROW',
        initialvalue:0,
        id:this.name + this.id,
        html: '<div style="clear:both;height:30px;" id="row" class="control row col-md-12 no-gutters" id='+ this.id +'></div>',
        gethtml : function () { 
            this.initialvalue=+1;
            return this.html;
        }
    },
    {
      name:'NAVBAR',
      initialvalue:0,
      id:this.name + this.id,
      html: '<nav style="height:50px;display:flex;" class="navbar col-md-12 navbar-expand-md bg-dark navbar-dark">  <!-- Brand -->  <a class="navbar-brand" href="#">Navbar</a>  <!-- Toggler/collapsibe Button -->  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">    <span class="navbar-toggler-icon"></span>  </button>  <!-- Navbar links -->  <div class="collapse navbar-collapse" id="collapsibleNavbar">    <ul class="navbar-nav">      <li class="nav-item">        <a class="nav-link" href="#">Link</a>      </li>      <li class="nav-item">        <a class="nav-link" href="#">Link</a>      </li>      <li class="nav-item">        <a class="nav-link" href="#">Link</a>      </li>    </ul>  </div></nav>',
      gethtml : function () {
          this.initialvalue=+1;
          return this.html;
      }
  },
];