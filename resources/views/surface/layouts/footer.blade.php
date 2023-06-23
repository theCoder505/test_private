<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="tel:+{{ $phone }}" class="footer_links"><i class="fa fa-phone" aria-hidden="true"></i>
                    &nbsp; Phone </a>
                <a href="{{ $whatsapp }}" class="footer_links"><i class="fa fa-whatsapp" aria-hidden="true"></i>
                    &nbsp; WhatsApp </a>
                <a href="{{ $fb }}" class="footer_links"><i class="fa fa-facebook" aria-hidden="true"></i>
                    &nbsp; Facebook </a>
                <a href="{{ $insta }}" class="footer_links"><i class="fa fa-instagram" aria-hidden="true"></i>
                    &nbsp; Instagram </a>
                <a href="{{ $tweet }}" class="footer_links"><i class="fa fa-twitter" aria-hidden="true"></i>
                    &nbsp; Twitter </a>
            </div>
            <div class="col-md-4">
                <a href="/more-pages/terms-conditions" class="footer_links"><i class="fa fa-arrow-right"
                        aria-hidden="true"></i> &nbsp;Terms & Conditions</a>
                <a href="/more-pages/privacy-policy" class="footer_links"><i class="fa fa-arrow-right"
                        aria-hidden="true"></i> &nbsp;Privacy Policy</a>
                <a href="mailto:{{$contact_email}}" class="footer_links"><i class="fa fa-arrow-right"
                        aria-hidden="true"></i> &nbsp; Contact Us</a>
            </div>
            <div class="col-md-4">
                <img src="{{ $siteicon }}" alt="image" class="website_brand_image">
            </div>
        </div>
        <div class="copyright_text">
            Copyright © {{date("Y")}} {{$appname}}. All Rights Reserved.
        </div>
    </div>
</footer>
