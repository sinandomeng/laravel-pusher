@extends('filipay.layout')

@section('title', 'Page Title')

@section('content')

    <div class="bot-toggler"></div>

    <div class="bot-wrapper">
        <div class="bot-header">
            <div class="bot-heading">
                <h5 class="bot-title">FiliPay</h5>
                <small class="bot-sub-title">Welcome to FiliPay! Please talk to our AI for quick assistance.</small>
            </div>

            <div class="bot-close">
                <i class="fa fa-times fa-lg" aria-hidden="true"></i>
            </div>
        </div>

        <div class="bot-body">
            {{--
                <div class="bot-greetings">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis harum consectetur at repudiandae nisi similique repellat quaerat error eaque nostrum, optio eos rem quia aperiam quidem dolore voluptatum quos labore!
                </div>
            --}}

            {{-- <div class="bot-bubble bot-message">
                <div class="bot-image">
                    <img src="{{ url('/vendor/filipay/img/bot-icon.png') }}" />
                </div>
                <div class="bot-content">
                    Hi, what is your name?
                </div>
            </div>

            <div class="bot-bubble bot-request">
                <div class="bot-content">
                    John
                </div>
                <div class="bot-image">
                    <img src="{{ url('/vendor/filipay/img/user-icon.png') }}" />
                </div>
            </div>

            <div class="bot-bubble bot-message">
                <div class="bot-image">
                    <img src="{{ url('/vendor/filipay/img/bot-icon.png') }}" />
                </div>
                <div class="bot-content">
                    Hi John, how can I help you today?
                </div>
            </div>

            <div class="bot-bubble bot-request">
                <div class="bot-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat dignissimos suscipit adipisci soluta ex, veniam ea vel in deserunt expedita.
                </div>
                <div class="bot-image">
                    <img src="{{ url('/vendor/filipay/img/user-icon.png') }}" />
                </div>
            </div> --}}
        </div>

        <div class="bot-footer">
            <form id="chat-form" autocomplete="off">
                <input type="text" id="bot-input" size="80" value="" placeholder="Ask something..." />
                <button type="submit" id="bot-action">Send</button>
            </form>
        </div>
    </div>

@endsection