
@extends('main')

@section('title',' | About ')

@section('content')
            <div class="row">
                <div class="col-md-12">
                <div class="jumbotron">
                      <h1>Contact Me!</h1>
                      <hr>
                    {{-- we are using url because we didnt set a named route --}}
                     <form action="{{url('contact') }}" method="POST">
                     {{csrf_field() }} {{-- we need this  --}}
                        <div class="form-group" >
                             <label name="email">Email:</label>
                             <input id='email' name='email' class="form-control">
                        </div>

                        <div class="form-group" >
                             <label name="subject">Suject:</label>
                             <input id='subject' name='subject' class="form-control">
                         </div>

                         <div class="form-group" >
                             <label name="message">Message:</label>
                             <textarea id='message' name='message' class="form-control">Type your message Here ... </textarea>
                         </div>

                         <input type="submit" value="Send Message" class="btn btn-success"> 

                     </form>
                      
                    </div>
                </div>
            </div> <!-- End of header . row -- >
@endsection 

