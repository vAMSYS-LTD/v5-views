<div class="grid md:grid-cols-3 gap-2">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Get Help</h4>
        </div>

        <div class="px-6 py-2 space-y-2">
            <div class="mb-2">
                <a href="https://discord.gg/aAVfmwcx56" target="_blank" class="flex space-x-2">
                    <x-icon name="brands.discord" class="w-5 h-5"/>
                    <span class="">Discord - Owner and Staff Discord</span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://vamsys.dev/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.heart-pulse" class="w-5 h-5"/>
                    <span class="">Changelog & Developer Portal</span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://docs.vamsys.dev/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.book-open-cover" class="w-5 h-5"/>
                    <span class="">Manual - System Docs </span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://protocol.vamsys.dev/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.book-open-cover" class="w-5 h-5"/>
                    <span class="">Protocol - API Docs </span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://vamsys.vision/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.comments" class="w-5 h-5"/>
                    <span class="">Vision - Bug Reports & Suggestions </span>
                </a>
            </div>
            <div class="mb-2">
                <a href="https://help.vamsys.co.uk/" target="_blank" class="flex space-x-2">
                    <x-icon name="duotone.messages-question" class="w-5 h-5"/>
                    <span class="">Helpdesk</span>
                </a>
            </div>
        </div>
    </div>

    <div class="card md:col-span-2">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Support Request</h4>
        </div>

        <div class="px-6 py-2 space-y-2">
            <div id="zammad-feedback-form"></div>
        </div>
    </div>


    <script id="zammad_form_script" src="https://help.vamsys.co.uk/assets/form/form.js"></script>

    <script>
        $(function() {
            $('#zammad-feedback-form').ZammadForm({
                messageTitle: 'Feedback Form',
                messageSubmit: 'Submit',
                messageThankYou: 'Thank you for your inquiry (#%s)! We\'ll contact you as soon as possible.',
                attributes: [
                    {
                        display: 'Name',
                        name: 'name',
                        tag: 'input',
                        type: 'text',
                        placeholder: 'Your Name',
                        defaultValue: @js($this->user->name),
                    },
                    {
                        display: 'Email',
                        name: 'email',
                        tag: 'input',
                        type: 'email',
                        required: true,
                        placeholder: 'Your Email',
                        defaultValue: @js($this->airlineStaff->staff_email?:$this->user->email),
                    },
                    {
                        display: 'Message',
                        name: 'body',
                        tag: 'textarea',
                        required: true,
                        placeholder: 'Your Message…',
                        defaultValue: @js('

----
Please do not remove this:
VA Identifier: '.$this->airline->identifier),
                        rows: 7,
                    }
                ]
            });
        });
    </script>
</div>

@push('styles')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>

    </style>
@endpush
