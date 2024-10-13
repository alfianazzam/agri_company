<section class="module" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Contact Us</h2>
                <div class="module-subtitle font-serif"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <form id="contactForm" role="form" method="post" action="php/contact.php">
                    <div class="form-group">
                        <label class="sr-only" for="name">Name</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name." />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address." />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="7" id="message" name="message" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Submit</button>
                    </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
            </div>
            <div class="col-sm-4">
                <div class="alt-features-item mt-0">
                    <div class="alt-features-icon"><span class="icon-megaphone"></span></div>
                    <h3 class="alt-features-title font-alt">Where to Meet</h3>
                    @if($company)
                        {{ $company->name }}<br />
                        {{ $company->address }}<br />
                        {{ $company->phone }}
                    @else
                        <p>Company information not available.</p>
                    @endif
                </div>
                <div class="alt-features-item mt-xs-60">
                    <div class="alt-features-icon"><span class="icon-map"></span></div>
                    <h3 class="alt-features-title font-alt">Say Hello</h3>
                    @if($company)
                        Email: {{ $company->email }}<br />
                        Phone: {{ $company->phone }}
                    @else
                        <p>Contact information not available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
