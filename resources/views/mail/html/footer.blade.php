<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
            <tr>
                <td class="content-cell" align="center">
                    <p>
                    @if(config('liberu.config.facebook'))
                        <a href="{{ config('liberu.config.facebook') }}">
                            <img src="{{ url('images/emails/facebook.svg') }}"
                                alt="facebook"
                                style="max-width: 48px">
                        </a>
                    @endif
                    @if(config('liberu.config.instagram'))
                        <a href="{{ config('liberu.config.instagram') }}">
                            <img src="{{ url('images/emails/instagram.svg') }}"
                                alt="instagram"
                                style="max-width: 48px">
                        </a>
                    @endif
                    @if(config('liberu.config.twitter'))
                        <a href="{{ config('liberu.config.twitter') }}">
                            <img src="{{ url('images/emails/twitter.svg') }}"
                                alt="twitter"
                                style="max-width: 48px">
                        </a>
                    @endif
                    </p> 
                    {{ Illuminate\Mail\Markdown::parse($slot) }}
                </td>
            </tr>
        </table>
    </td>
</tr>
