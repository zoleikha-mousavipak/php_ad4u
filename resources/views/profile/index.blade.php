@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Dear {{ Auth::user()->name }},
            <?php
            $t = date("H");
            if ($t < "10") {
                echo "Have a good morning!";
            } elseif ($t < "20") {
                echo "Have a good day!";
            } else {
                echo "Have a good night!";
            }
            ?>
        </h2>
    </div>
</div>
@endsection
