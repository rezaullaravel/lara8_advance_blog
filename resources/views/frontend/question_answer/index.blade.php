@extends('frontend.frontend_master')

@section('title')
    Question Answer Page
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
           <div class="col-sm-10 offset-sm-1">
            @if (Session('info-message'))
                <div class="alert alert-success">
                    <h4 class="text-center">{{ Session::get('info-message') }}</h4>
                </div>
            @endif
             <div class="card">
                <div class="card-header">
                    <h4>Ask Your Question</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('question.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Your Question</label>
                            <textarea name="question"  rows="6" class="form-control" required placeholder="Ask Your Question Here......."></textarea>
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
             </div>
           </div>
        </div>{{-- row end --}}

        <div class="row mt-5">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Question List</h4>
                    </div>
                    @foreach($questions as $question)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <h4>{{ Str::limit($question->question,150) }}</h4>
                                <span>Author: {{ $question->user->name }}</span> <span>Date:{{ $question->created_at }}</span> <span>Answer(5)</span>
                            </div>
                            <div class="col-sm-4">
                                @if ($question->user_id==Auth::user()->id)
                                  <a href="{{ route('question.delete',$question->id) }}" onclick="return confirm('Are You sure to delete this question permanently???');" class="btn btn-danger">Delete</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div>
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- js for refresh page and keep scroll postion --}}
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
@endsection
