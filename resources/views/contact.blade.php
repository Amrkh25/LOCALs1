@extends('layouts.header')

@section('section')
<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Contact us</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="full">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <fieldset>
                            <input type="text" placeholder="Enter your full name" name="name" required />
                            <input type="email" placeholder="Enter your email address" name="email" required />
                            <input type="text" placeholder="Enter subject" name="subject" required />
                            <textarea placeholder="Enter your message" name="message" required></textarea>
                            <input type="submit" value="Submit" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
