<div class="flex flex-col space-y-4">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">vAMSYS VA Application Form</h4>
        </div>
        <div class="px-6 py-4 space-y-2">

            <div id="dismiss-example-success" class="bg-success text-white rounded-md py-3 px-5 flex justify-between items-center">
                <p>
                    <span class="font-bold">Success</span> - Application has been submitted!
                </p>
            </div>
        </div>
    </div>

    <div>
        <x-filament::section>
            <x-slot name="heading">
                What's next?
            </x-slot>
            <x-slot name="description">
                Next steps are dependant if you had an account with vAMSYS prior to submitting the application.
            </x-slot>

            <div class="grid md:grid-cols-2 gap-8">
                <x-filament::section>
                    <x-slot name="heading">
                       You have a vAMSYS Account
                    </x-slot>

                    <x-slot name="description">
                        You are already a vAMSYS user - either as current/former pilot or VA Staff
                    </x-slot>

                    <div class="flex flex-col space-y-2">
                        <div>
                            - Proceed to <a href="https://vamsys.io" target="_blank">https://vamsys.io</a> and log in.
                        </div>
                        <div>
                            - Visit Select VA page from User Menu dropdown or visit <a href="https://vamsys.io/select" target="_blank">Select Page Directly</a>.
                        </div>
                        <div>
                            - Select your newly created Virtual Airline. If it's not there yet, give it a couple of minutes.
                        </div>
                    </div>
                </x-filament::section>
                <x-filament::section>
                    <x-slot name="heading">
                        You do not have a vAMSYS Account
                    </x-slot>

                    <x-slot name="description">
                        This is your first experience with vAMSYS and you do not hold a user account
                    </x-slot>

                    <div class="flex flex-col space-y-2">
                        <div>
                            - Check your email. You will receive an email from us with a subject line starting with "Login information for" followed by your VA name. <br/>
                            The email contains your login information.
                        </div>
                        <div>
                            - Proceed to <a href="https://vamsys.io" target="_blank">https://vamsys.io</a> and log in.
                        </div>
                        <div>
                            - Request email verification link and confirm your email address.
                        </div>
                        <div>
                            - On return, select your newly created Virtual Airline.
                        </div>
                    </div>
                </x-filament::section>
            </div>
            <div class="mt-8">
                <a href="https://docs.vamsys.dev/checklist" target="_blank" class="btn btn-lg w-full bg-success text-white">
                    Once logged in and in your VA, click here to see the New VA Checklist which will guide you through 5+ day process of setting up your new Virtual Airline
                </a>
            </div>

        </x-filament::section>
    </div>

</div>
