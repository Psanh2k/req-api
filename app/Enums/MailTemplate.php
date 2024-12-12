<?php

namespace App\Enums;

enum MailTemplate: string
{
    case MEMBER_FORGOT_PASSWORD            = 'ML_A02_01';
    case MEMBER_REGISTER                   = 'ML_A04_01';
    case CONTACT_SUCCESS_TO_MEMBER         = 'ML_A11_01';
    case CONTACT_SUCCESS_TO_ADMIN          = 'ML_A11_02';
    case ADMIN_DELETE_MEMBER               = 'ML_E03_01';
    case ADMIN_INVITE_REGISTER_TALENT      = 'ML_B01_01';
    case ADMIN_REJECT_REGISTER_TALENT      = 'ML_B01_03';
    case REQUEST_VIDEO_NOTIFICATION_MEMBER = 'ML_A09_01';
    case REQUEST_VIDEO_NOTIFICATION        = 'ML_B08_C07_01';
    case MEMBER_REQUEST_TALENT             = 'ML_B01_02';
    case MEMBER_CHANGE_EMAIL               = 'ML_A10_01';
    case MANAGER_REGISTER_TALENT           = 'FR_D090_2';
    case TALENT_FORGOT_PASSWORD            = 'ML_B04_C03_01';
    case REMIND_REQUEST_VIDEO_AFTER_3_DAYS = 'ML_B08_C07_02';
    case REMIND_REQUEST_VIDEO_AFTER_6_DAYS = 'ML_B08_C07_03';

    public static function all() : array
    {
        return array_column(MailTemplate::cases(), 'value');
    }

    public static function getSubjectByKeyTemplate($keyTemplate) : string
    {
        return __(
            'labels.subjects.' . $keyTemplate,
            ['service_name' => __('labels.subjects.service_name')]
        );
    }

    public static function getMailTemplate($keyTemplate) : string|null
    {
        return match ($keyTemplate) {
            MailTemplate::MEMBER_FORGOT_PASSWORD->value              => 'emails.auth.reset-pass',
            MailTemplate::MEMBER_REGISTER->value                     => 'emails.auth.member-register',
            MailTemplate::CONTACT_SUCCESS_TO_MEMBER->value           => 'emails.contact.member',
            MailTemplate::CONTACT_SUCCESS_TO_ADMIN->value            => 'emails.contact.admin',
            MailTemplate::ADMIN_DELETE_MEMBER->value                 => 'emails.admin.delete-member',
            MailTemplate::ADMIN_INVITE_REGISTER_TALENT->value        => 'emails.admin.approve-talent',
            MailTemplate::ADMIN_REJECT_REGISTER_TALENT->value        => 'emails.admin.reject-talent',
            MailTemplate::REQUEST_VIDEO_NOTIFICATION->value          => 'emails.payment.request-video-notification',
            MailTemplate::MEMBER_REQUEST_TALENT->value               => 'emails.member.request-talent',
            MailTemplate::MEMBER_CHANGE_EMAIL->value                 => 'emails.member.change-email',
            MailTemplate::MANAGER_REGISTER_TALENT->value             => 'emails.manager.regist-talent',
            MailTemplate::TALENT_FORGOT_PASSWORD->value              => 'emails.talent.reset-pass',
            MailTemplate::REMIND_REQUEST_VIDEO_AFTER_3_DAYS->value   => 'emails.talent.remind-after-3-days',
            MailTemplate::REMIND_REQUEST_VIDEO_AFTER_6_DAYS->value   => 'emails.talent.remind-after-6-days',
            MailTemplate::REQUEST_VIDEO_NOTIFICATION_MEMBER->value   => 'emails.payment.request-video-notification-member',
            default                                           => null,
        };
    }
}
