@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if (session('info'))

                <div class="alert alret-danger"> {{session('info')}}</div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{Auth::user()->email
                        }}
                    {{ __('You are logged in!') }}

                    @foreach ($user as $use )
                        <div>
                            <h1><a href="{{route('profilee',['userid' => $use->id ])}}">{{$use->name}}</h1>
                            <p>{{$use->email}}</p>

                        </div>
                        {{-- <script>
                            var friendsdata=@json($use->friends);

                            console.log(friendsdata);

                        </script> --}}
                       @if ($use->id == Auth::user()->id)

                       @else
                       @php
                       $buttonPrinted = false;
                       @endphp
                    @if($use->friends)

                   @foreach ($use->friends as $key)
                       @if ($key['userid'] == Auth::user()->id && $key['status'] == 'pending')
                           <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $use->id]) }}" class="btn btn-primary">Cancel Request</a>
                           @php
                               $buttonPrinted = true;
                               break;
                           @endphp
                       @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'accepted')
                           <p>Friend</p>
                           @php
                               $buttonPrinted = true;
                               break;
                           @endphp
                       @endif
                   @endforeach
@endif
                   @if (!$buttonPrinted)
                       <a href="{{ route('homee', ['userid' => Auth::user()->id, 'userid2' => $use->id]) }}" class="btn btn-primary">Add</a>
                   @endif

                       @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
