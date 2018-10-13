@if (strlen(config('recaptcha.key')) > 0)
    <div id="{{ $id }}" class="g-recaptcha" data-sitekey="{{ config('recaptcha.key') }}"></div>
@else
    <div class="recaptcha-error" style="display:inline-block; border-radius: 4px;padding: .5rem .75rem;border: 2px solid red;color: red;font-weight: bold">ReCaptcha: Sitekey not found</div>
@endif