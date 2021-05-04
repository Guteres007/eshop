 @extends('frontend._layouts.frontend-layout')
 @section('container')
     <!-- site__body -->
     <div class="site__body">
         <div class="page-header">
             <div class="page-header__container container">
                 <div class="page-header__breadcrumb">
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item">
                                 <a href="/">Domů</a>
                                 <svg class="breadcrumb-arrow" width="6px" height="9px">
                                     <use xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                 </svg>
                             </li>

                             <li class="breadcrumb-item active" aria-current="page">Kontakt</li>
                         </ol>
                     </nav>
                 </div>
                 <div class="page-header__title">
                     <h1>Kontakt</h1>
                 </div>
             </div>
         </div>
         <div class="block">
             <div class="container">
                 <div class="card mb-0 contact-us">
                     <div class="contact-us__map">
                         <iframe
                             src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2586.273620381837!2d17.27566921576429!3d49.59258935668339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47124e8180d88aed%3A0x355766b837619995!2sOlomouc%20hl.%20n.!5e0!3m2!1scs!2scz!4v1620122357342!5m2!1scs!2scz'
                             frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
                     </div>
                     <div class="card-body">
                         <div class="contact-us__container">
                             <div class="row">
                                 <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                     <h4 class="contact-us__header card-title">Kontakt</h4>
                                     <div class="contact-us__address">

                                         <p>
                                             Náměstí Hrdinů
                                             23,
                                             Olomouc<br>
                                             Email: info@shoply.cz<br>
                                             Telefon: +420 728 486 511
                                         </p>
                                         <p>
                                             <strong>Otevírací hodinny</strong><br>
                                             PO - PÁ 09:00 - 17:00
                                         </p>

                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- site__body / end -->
 @endsection
