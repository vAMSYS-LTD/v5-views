<div>
    <div class="large-alert alert-danger">
        <div class="text-center pb-0 flex flex-col sm:flex-row ">
            <div class="mb-4 sm:mb-0 flex justify-center items-center">
                <svg class="large-alert-icon fill-danger inline-flex" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM12 17.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3.72 0 1.3.58 1.3 1.3 0 .72-.58 1.3-1.3 1.3zm1-4.3h-2V7h2v6z"></path>
                </svg>
            </div>
            <div class="my-auto grow">
                <p>
                    You may <strong>only</strong> invite Pilots to your Virtual Airline <strong>if you have their permission</strong>.<br/>
                    If we cannot find a registered vAMSYS user with these details - a new account will be created for them. <br/>
                    Alternatively, existing user will have a pilot account created for your VA. <br/>
                    You can also use this form to manually award hours, points and bonus points to existing pilots.
                </p>
            </div>
        </div>
    </div>

    <div>
        <form wire:submit="create">
            {{ $this->form }}

            <button type="submit" class="mt-2 btn btn-success w-full">
                Submit
            </button>
        </form>
    </div>


    <div class="mt-4">
        {{ $this->table }}
    </div>
</div>
