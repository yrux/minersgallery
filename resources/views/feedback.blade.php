
<x-app-layout>
    <div class="feedback">
        <h1>Feedback</h1>
        <span>Using this form you can send us a message.</span>
        <form action="#" class="feedbackForm">
            <label for="name">
            <span>Your Name:</span>
            <input type="text" name="name" id="name" size="40" />
            </label>
            <label for="email">
            <span>Email:</span>
            <input type="email" name="email" id="email" size="40" />
            </label>
            <label for="subject">
            <span>Subject:</span>
            <input type="text" name="subject" id="subject" size="40" />
            </label>
            <label for="message">
            <span>Text:</span>
            <br />
            <textarea
                name="message"
                id="message"
                cols="50"
                rows="7"
            ></textarea>
            </label>
            <br />
            <div>
            <div class="g-recaptcha" data-sitekey="6Lce2uEaAAAAAM-xvFW_LKVbOat1OMScCHXeKmvD"></div>
            </div>
            <input type="submit" value="OK" />
        </form>
    </div>
    @push('js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endpush
</x-app-layout>
