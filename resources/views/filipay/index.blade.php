@extends('filipay.layout')

@section('title', 'Page Title')

@section('content')

    <div class="bot-toggler"></div>

    <div class="bot-wrapper">
        <div class="bot-header">
            <div class="bot-heading">
                <h5 class="cb-title">FiliPay</h5>
                <small class="cb-sub-title">Welcome to FiliPay! Please talk to our AI for quick assistance.</small>
            </div>

            <div class="bot-close">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>

        <div class="bot-body">
            <div class="bot-bubble bot-message">
                <img class="bot-image" src="{{ url('/vendor/filipay/img/bot-icon.png') }}" />
                <div class="content">
                    Hi, what is your name?
                </div>
            </div>
            
            <div class="bot-bubble bot-request">
                <div class="content">
                    John
                </div>
                <img class="bot-image" src="{{ url('/vendor/filipay/img/user-icon.png') }}" />
            </div>

            <div class="bot-bubble bot-message">
                <img class="bot-image" src="{{ url('/vendor/filipay/img/bot-icon.png') }}" />
                <div class="content">
                    Hi John, how can I help you today?
                </div>
            </div>
        </div>

        <div class="bot-footer">
            <form id="chat-form" autocomplete="off">
                <input type="text" id="wisdom" size="80" value="" placeholder="Ask something..." />
            </form>
        </div>
    </div>

@endsection