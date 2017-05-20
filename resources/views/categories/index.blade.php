@extends('admin_main')
<!-- main is the name of the page under views -->

@section('title',' | Manage Categories ')

@section('stylesheets')
    
    {!! Html::style('css/adminHome.css') !!}
    

@endsection

@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
   <div id="app">
      <div class="row category_index">
         <br>
         <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($categories as $category)
                  <tr>
                     <td>{{ $category->id }}</td>
                     <td>{{ $category->name }}</td>
                     <td>  
                        {{-- <a href="{{ route('category.update', $category->id) }}">Edit</a> --}}
                      <button data-url="{{ route('category.update', $category->id) }}" class="myBtn btn btn-primary">Edit</button>


                        {!! Form::open(['method'=>'DELETE' ,'route'=>['category.destroy',$category->id]]) !!}
                        
                        <button class="btn btn-danger delete" onclick="return confirm('Are you sure?')">Delete</button>

                        {!! Form::close() !!}
                     </td>
                  </tr>
                  @endforeach
                  <tr v-for="group in groups">
                     <td>@{{ group.id }}</td>
                     <td>@{{ group.name }}</td>
                     <td>  
                        <button class="myBtn btn btn-primary" >Edit</button>

                        {!! Form::open(['method'=>'DELETE' ,'route'=>['category.destroy',$category->id]]) !!}
                        
                        <button class="btn btn-danger delete" onclick="return confirm('Are you sure?')">Delete</button>

                        {!! Form::close() !!}
                        </td>
                  </tr>
               </tbody>
            </table>
         </div>

         <div class="col-md-6 col-md-offset-3">
          <div class="jumbotron">
            <div class="lead-form">
               <h2 class="text-center">Add New Category </h2>
               <hr />
               <div class="row">
                  <div class="col-md-8">
                     <input type="text" class="form-control" placeholder="Category Name" v-model="startingGroup">
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-8">
                     <button class="btn btn-primary btn-block form-control" id="submit-form" v-on:click="AddNewGroup">Add Category</button>
                  </div>
               </div>
            </div>
            </div>
            <!-- end of .lead-form -->
         </div>
         <!-- end of .col-md-6.col-md-offset-3 -->
      </div>
      <!-- end of .row -->
   </div>
   <!-- end of #app -->
</div>

   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Category</h4>
        </div>
        <div class="modal-body">
{{-- 
            <form action="{{ route('category.update', $category->id) }}" method="post" id="myForm"> --}}

            <form id="myForm" method="post">
              <div>
                  <label for="name">Name:</label>
                  <input type="text" id="Category Name" name="name" class="form-control">
                  {{ csrf_field() }}
              </div>
              <br>
              <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection
@section('scripts')
  
  {!! Html::script('js/adminHome.js') !!}

    <script>

    // to call the modal and attatch attribute with the form
    // to fix the route

    $(document).ready(function(){
        $(".myBtn").click(function(){
          var url = $(this).attr("data-url");
          // console.log(url);
          $("#myForm").attr("action",url);
          $("#myModal").modal();
        });
    });

    </script>

  <script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
  <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js">
  </script>
  {{-- Lodash is a JavaScript library which provides utility functions for common programming tasks using the functional programming paradigm. Contents --}}
  <script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>

  <script>
    var app = new Vue({
      el: '#app',
      data: {
        startingGroup: '',
        groups:[]
      },
      methods: {
        AddNewGroup: function() {
          // console.log(this.startingGroup);
          var app = this
                axios.post('/categories/store', {
                name: this.startingGroup
                 })
                .then(function (response) {
                  console.log(response);
                var obj = {id: response.data.category.id, name: response.data.category.name};
                // console.log(obj);
                app.groups.push(obj);
                 // app.Group.push(response.data.group.name);
                 // app.GroupID.push(response.data.group.id);
                 })
                .catch(function (error) {
                  app.group = "Invalid Name"
                })
        }
      }
    })
  </script> 

@endsection