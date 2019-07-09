@extends('filipay.layout')

@section('title', 'Page Title')

@section('content')

    <div class="chatbot-wrapper">
        <div class="bot-toggler">
            <img src="{{ asset('/vendor/filipay/img/chat-icon.png') }}" alt="Chat Icon" />
        </div>
    
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
    
            {{-- <img class="bot-image" src="{{ url('/vendor/filipay/img/bot-icon.png') }}" /> --}}
            {{-- <img class="bot-image" src="{{ url('/vendor/filipay/img/user-icon.png') }}" /> --}}
    
            <div class="bot-body">
                <div class="bot-bubble bot-message">
                    <img class="bot-image" src="{{ url('/vendor/filipay/img/bot-icon.png') }}" />
                    <div class="bot-content">
                        Hello there! Need help? You can ask me anything in regards with FiliPay. I will try to quickly get back to you.
                    </div>
                </div>
    
                {{-- <div class="bot-bubble bot-request">
                    <div class="bot-content">
                        Where can I change my password?
                    </div>
                    <img class="bot-image" src="{{ url('/vendor/filipay/img/user-icon.png') }}" />
                </div>
    
                <div class="bot-bubble bot-message">
                    <img class="bot-image" src="{{ url('/vendor/filipay/img/bot-icon.png') }}" />
                    <div class="bot-content">
                        To change your password, please click the button below.
                        <br /> <br />
                        <a class="btn btn-default btn-sm" href="#">Change Password</a>
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
    </div>

@endsection