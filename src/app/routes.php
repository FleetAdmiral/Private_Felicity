<?php

/**
* Contains routes
* @var array
*/
$routes = [
    "/trash/"               => "/jugaad/trash/",
    "/jugaad/locale_dump/"  => "/page/locale_dump/",
    "/jugaad/"              => "/jugaad/read/",
    "/ajax/"                => "/ajax/",
    "/auth/"                => "/auth/",

    "/unsubscribe/"         => "/auth/unsubscribe/",

    "/login/"               => "/static_page/login/",
    "/logout/"              => "/static_page/logout/",
    "/register/"            => "/static_page/register/",
    "/scores/codecraft/"    => "/static_page/codecraft/",
    "/wdw/"                 => "/static_page/wdw/",
    "/accommodation/"       => "/static_page/accommodation/",

    "/sap/portal/mission/create/"               => "/sap_portal/create_mission/",
    "/sap/portal/review/mission/"               => "/sap_portal/review_mission/",
    "/sap/portal/review/submission/"            => "/sap_portal/review_submission/",
    "/sap/portal/users/approve/"                => "/sap_portal/approve_user/",
    "/sap/portal/users/remove/"                 => "/sap_portal/remove_user/",
    "/sap/portal/users/resend-password-email/"  => "/sap_portal/resend_password_email/",
    "/sap/portal/users/"                        => "/sap_portal/confirm_users/",
    "/sap/portal/"                              => "/sap_portal/",
    "/sap/"                                     => "/sap/",

    "/talks-and-workshops/web-development/register/webhook/"   => "/webdev_workshop/webhook/",
    "/talks-and-workshops/web-development/register/success/"           => "/webdev_workshop/success/",
    "/talks-and-workshops/web-development/register/"                   => "/webdev_workshop/register/",
    "/talks-and-workshops/web-development/pay_again/"                   => "/webdev_workshop/pay_again/",

    "/cultural-Colosseum/bob/register/webhook/"           => "/riderofstorms/webhook/",
    "/cultural-Colosseum/bob/register/success/"           => "/riderofstorms/success/",
    "/cultural-Colosseum/bob/register/"                   => "/riderofstorms/register/",
    "/cultural-Colosseum/bob/pay_again/"                  => "/riderofstorms/pay_again/",

    "/talks-and-workshops/arvr/register/webhook/"           => "/arvr_workshop/webhook/",
    "/talks-and-workshops/arvr/register/success/"           => "/arvr_workshop/success/",
    "/talks-and-workshops/arvr/register/"                   => "/arvr_workshop/register/",
    "/talks-and-workshops/arvr/pay_again/"                  => "/arvr_workshop/pay_again/",

    "/pulsation/artuino/register/webhook/"           => "/artuino_workshop/webhook/",
    "/pulsation/artuino/register/success/"           => "/artuino_workshop/success/",
    "/pulsation/artuino/register/"                   => "/artuino_workshop/register/",
    "/pulsation/artuino/pay_again/"                  => "/artuino_workshop/pay_again/",

    "/threads/kaizala/submit/"                       => "/contest/kaizala/",

    "/litcafe/ttt-workshop/register/payment-webhook/"   => "/ttt_workshop/webhook/",
    "/litcafe/ttt-workshop/register/success/"           => "/ttt_workshop/success/",
    "/litcafe/ttt-workshop/register/"                   => "/ttt_workshop/register/",

    "/talks-and-workshops/paper-presentation/register/" => "/contest/paper_presentation/",
    "/threads/visualizeit/submit/" => "/contest/visualizeit/",

    "/api/"     => "/page/show/api/",
    "/"         => "/page/show/"
];
