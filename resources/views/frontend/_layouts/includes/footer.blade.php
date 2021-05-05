        <!-- site__footer -->
        <footer class="site__footer">
            <div class="site-footer">
                <div class="container">
                    <div class="site-footer__widgets">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-5">
                                <div class="site-footer__widget footer-contacts">
                                    <h5 class="footer-contacts__title">Kontakt</h5>
                                    <div class="footer-contacts__text">
                                        Máte-li dotazy ke zboží nebo objednávce, napište nám.
                                    </div>
                                    <ul class="footer-contacts__contacts">
                                        <li><i class="footer-contacts__icon fas fa-globe-americas"></i> Náměstí Hrdinů
                                            23,
                                            Olomouc</li>
                                        <li><i class="footer-contacts__icon far fa-envelope"></i> info@shoply.cz
                                        </li>
                                        <li><i class="footer-contacts__icon fas fa-mobile-alt"></i>+420 728 486 511</li>
                                        <li><i class="footer-contacts__icon far fa-clock"></i> PO - PÁ 09:00 - 17:00
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-3">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">Informace</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="{{ route('frontend.contact') }}"
                                                class="footer-links__link">Kontakt</a>
                                        </li>
                                        <li class="footer-links__item"><a
                                                href="{{ route('frontend.terms-conditions') }}"
                                                class="footer-links__link">Obchodní podmínky</a></li>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="site-footer__widget footer-newsletter">
                                    <h5 class="footer-newsletter__title">Newsletter</h5>
                                    <div class="footer-newsletter__text">
                                        Už Vám neunikne žádna akce.
                                    </div>
                                    <form action="" class="footer-newsletter__form">
                                        <label class="sr-only" for="footer-newsletter-address">Email</label>
                                        <input type="text" class="footer-newsletter__form-input form-control"
                                            id="footer-newsletter-address" placeholder="Email">
                                        <button class="footer-newsletter__form-button btn btn-primary">Odebírat</button>
                                    </form>
                                    <div class="footer-newsletter__text footer-newsletter__text--social">
                                        Sledujte nás na internetu
                                    </div>
                                    <!-- social-links -->
                                    <div
                                        class="social-links footer-newsletter__social-links social-links--shape--circle">
                                        <ul class="social-links__list">
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--rss" href=""
                                                    target="_blank">
                                                    <i class="fas fa-rss"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--youtube" href=""
                                                    target="_blank">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--facebook" href=""
                                                    target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--twitter" href=""
                                                    target="_blank">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--instagram"
                                                    href="" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- social-links / end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer__bottom">
                        <div class="site-footer__copyright">
                            <!-- copyright -->
                            <a href="https://www.shoply.cz" target="_blank" class="d-flex">

                                <img style="min-width: 100px" src="/images/frontend/shoply-logo.svg" alt="shoply">

                            </a>
                            <!-- copyright / end -->
                        </div>
                        <div class="site-footer__payments">
                            <img style="min-width: 120px" src="/images/frontend/gopay-logo.svg" alt="gopay">
                        </div>
                    </div>
                </div>
                <div class="totop">
                    <div class="totop__body">
                        <div class="totop__start"></div>
                        <div class="totop__container container"></div>
                        <div class="totop__end">
                            <button type="button" class="totop__button">
                                <svg width="13px" height="8px">
                                    <use xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-up-13x8"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- site__footer / end -->
