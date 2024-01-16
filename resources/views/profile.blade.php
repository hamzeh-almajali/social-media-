@extends('layouts.app')
@section('content')
<div>
    <h1>{{$profile->name}}</h1>


                        @php
                       $buttonPrinted = false;
                       @endphp
                       @if ($profile->id == Auth::user()->id)

                      @else
                         @foreach ($profile->friends as $key)
                    @if ($key['userid'] == Auth::user()->id && $key['status'] == 'pending')
                        <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" class="btn btn-primary">Cancel Request</a>
                    @php
                        $buttonPrinted = true;
                        break;
                    @endphp
                    @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'accepted')
                    <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" class="btn btn-danger">remove friends</a>

                        @php
                            $buttonPrinted = true;
                            break;
                        @endphp
                         @endif
    @endforeach
    @if (!$buttonPrinted)
        <a href="{{ route('homee', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" class="btn btn-primary">Add</a>
    @endif
    @endif

    <h2>{{$profile->email}}</h2>
    <h3>{{ now()->diffInhours($profile->created_at) }} hours ago</h3>


</div>

@endsection
