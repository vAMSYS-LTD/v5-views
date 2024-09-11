<div>
    <div class="flex panel justify-between space-x-8">
        <div
            class="border border-gray-500/20 rounded-md shadow-[rgb(31_45_61_/_10%)_0px_2px_10px_1px] dark:shadow-[0_2px_11px_0_rgb(6_8_24_/_39%)] p-6 pt-12 mt-8 relative">
            <div
                class="bg-primary absolute text-gray-200 left-6 -top-8 w-16 h-16 rounded-md flex items-center justify-center mb-5 mx-auto">
                <x-fal-file-contract class="w-8 h-8" />
            </div>
            <h5 class="text-lg font-semibold mb-3.5">Terms of Service</h5>
            <p class="text-white-dark text-[15px] mb-3.5">Our agreement between you and us. Our Terms of Service covers
                access and use of our Services.</p>
            <a href="{{ route('legal.terms-of-service') }}" target="_blank" class="text-primary font-semibold hover:underline group">
                View Terms of Service
            </a>
        </div>

        <div
            class="border border-gray-500/20 rounded-md shadow-[rgb(31_45_61_/_10%)_0px_2px_10px_1px] dark:shadow-[0_2px_11px_0_rgb(6_8_24_/_39%)] p-6 pt-12 mt-8 relative">
            <div
                class="bg-primary absolute text-gray-200 left-6 -top-8 w-16 h-16 rounded-md flex items-center justify-center mb-5 mx-auto">
                <x-fal-file-user class="w-8 h-8" />
            </div>
            <h5 class="text-lg font-semibold mb-3.5">Acceptable use Policy</h5>
            <p class="text-white-dark text-[15px] mb-3.5">Part of the Terms of Service, covers some rules as well as
                conditions regarding your Contributions.</p>
            <a href="{{ route('legal.acceptable-use') }}" target="_blank" class="text-primary font-semibold hover:underline group">
                View Acceptable use Policy
            </a>
        </div>

        <div
            class="border border-gray-500/20 rounded-md shadow-[rgb(31_45_61_/_10%)_0px_2px_10px_1px] dark:shadow-[0_2px_11px_0_rgb(6_8_24_/_39%)] p-6 pt-12 mt-8 relative">
            <div
                class="bg-primary absolute text-gray-200 left-6 -top-8 w-16 h-16 rounded-md flex items-center justify-center mb-5 mx-auto">
                <x-fal-user-secret class="w-8 h-8" />
            </div>
            <h5 class="text-lg font-semibold mb-3.5">Privacy Policy</h5>
            <p class="text-white-dark text-[15px]  mb-3.5">Describes how and why we might collect, store, use your
                information when you use our Services.</p>
            <a href="{{ route('legal.privacy-policy') }}" target="_blank" class="text-primary font-semibold hover:underline group">
                View Privacy Policy
            </a>
        </div>

        <div
            class="border border-gray-500/20 rounded-md shadow-[rgb(31_45_61_/_10%)_0px_2px_10px_1px] dark:shadow-[0_2px_11px_0_rgb(6_8_24_/_39%)] p-6 pt-12 mt-8 relative">
            <div
                class="bg-primary absolute text-gray-200 left-6 -top-8 w-16 h-16 rounded-md flex items-center justify-center mb-5 mx-auto">
                <x-fal-cookie class="w-8 h-8" />
            </div>
            <h5 class="text-lg font-semibold mb-3.5">Cookie Policy</h5>
            <p class="text-white-dark text-[15px]  mb-3.5">Explains how we use cookies and similar to recognise you when
                you visit us.</p>
            <a href="{{ route('legal.cookie-policy') }}" target="_blank" class="text-primary font-semibold hover:underline group">
                View Cookie Policy
            </a>
        </div>
    </div>
</div>
