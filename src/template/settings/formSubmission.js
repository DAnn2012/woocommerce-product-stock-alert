import { __ } from '@wordpress/i18n';

export default {
    id: 'form_submission',
    priority: 3,
    name: __("Prompt Messages", "woocommerce-stock-manager"),
    desc: __("Manage post-form submission messages.", "woocommerce-stock-manager"),
    icon: "adminLib-submission-message",
    submitUrl: "save-stockmanager",
    modal: [
        {
            key: "alert_success",
            type: "textarea",
            class: "woo-setting-wpeditor-class",
            // Translators: This message display dynamic product title and emails.
            desc: __("Tip: Utilize %product_title% for dynamic product titles and %customer_email% for personalized customer email addresses in your messages.", "woocommerce-stock-manager"),
            label: __("Successful form submission", "woocommerce-stock-manager"),
        },
        {
            key: 'separator_content',
            type: 'section',
            label: "",
        },
        {
            key: "alert_email_exist",
            type: "textarea",
            class: "woo-setting-wpeditor-class",
            // Translators: This message display dynamic product title and emails.
            desc: __("Tip: Enhance personalization by incorporating %product_title% for dynamic product titles and %customer_email% for individual customer emails.", "woocommerce-stock-manager"),
            label: __("Repeated subscription alert", "woocommerce-stock-manager"),
        },
        {
            key: 'separator_content',
            type: 'section',
            label: "",
        },
        {
            key: "valid_email",
            type: "textarea",
            class: "woo-setting-wpeditor-class",
            desc: __("Personalize the message shown to users when they try to subscribe with an invalid email address.", "woocommerce-stock-manager"),
            label: __("Email validation error", "woocommerce-stock-manager"),
        },
        {
            key: 'separator_content',
            type: 'section',
            label: "",
        },
        {
            key: "alert_unsubscribe_message",
            type: "textarea",
            class: "woo-setting-wpeditor-class",
            desc: __("Modify the text that confirms user that they have successful unsubscribe.", "woocommerce-stock-manager"),
            label: __("Unsubscribe confirmation", "woocommerce-stock-manager"),
        },
        {
            key:  'note_blocktext',
            type:  'blocktext',
            label: 'no_label',
            blocktext: __("Disclaimer – Loco Translator Compatibility: This plugin allows you to customize certain frontend text settings and descriptions. Default texts are Loco Translator-ready, but any changes made in the corresponding custom text box will no longer be available for translation via Loco Translator. Hence, please enter the customized text in your desired language only.", "woocommerce-stock-manager"),
        }
    ]
};
