<x-layouts.front.base>
    <div class="max-w-screen-xl mx-auto p-8">
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-4xl font-bold text-primary-800">Privacy Policy</h1>
            <p class="text-gray-600 mt-2">Effective Date: <span class="font-medium">December 16, 2024</span></p>
        </header>

        <!-- Introduction -->
        <section>
            <p class="text-gray-600 mb-6">
                Thank you for using <strong>Mapology</strong>. Your privacy is important to us. This Privacy Policy
                explains
                how we collect, use, disclose, and safeguard your information when you visit our website, use our
                services,
                or interact with our platform.
            </p>
        </section>

        <!-- Section 1 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary-800">Information We Collect</h2>

            <h3 class="text-lg font-semibold mb-2">Personal Information</h3>
            <ul class="list-disc list-inside mb-4 px-4 text-gray-800">
                <li><strong>Contact Information</strong>: email address, phone number (if given).</li>
                <li><strong>Account Information</strong>: Username, password, and profile details.</li>
                <li><strong>Social Login Information</strong>: OAuth provider IDs (e.g., Google, GitHub).</li>
            </ul>

            <h3 class="text-lg font-semibold mb-2">Non-Personal Information</h3>
            <ul class="list-disc list-inside mb-4 px-4 text-gray-800">
                <li>Browser type and version.</li>
                <li>Device type, operating system, and IP address.</li>
                <li>Usage data such as pages visited, time spent on site, and clicks.</li>
            </ul>

            <h3 class="text-lg font-semibold mb-2">Cookies and Tracking Technologies</h3>
            <p>We use cookies, web beacons, and similar technologies to collect data and improve your experience on our
                platform.</p>
        </section>

        <!-- Section 2 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary-800">How We Use Your Information</h2>
            <ul class="list-disc list-inside mb-4 px-4 text-gray-800">
                <li>To create and manage user accounts.</li>
                <li>To personalize your experience on our platform.</li>
                <li>To process transactions, such as quiz or content submissions.</li>
                <li>To improve and optimize our services.</li>
                <li>To send administrative updates and notifications.</li>
                <li>To provide customer support.</li>
                <li>For analytics, research, and measuring platform performance.</li>
            </ul>
        </section>

        <!-- Section 3 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary-800">How We Share Your Information</h2>
            <ul class="list-disc list-inside mb-4 px-4 text-gray-800">
                <li><strong>Service Providers</strong>: With trusted vendors to operate our website.</li>
                <li><strong>Legal Requirements</strong>: If required by law or to enforce policies.</li>
                <li><strong>Business Transfers</strong>: During mergers, acquisitions, or sales.</li>
                <li><strong>With Your Consent</strong>: For purposes not described here.</li>
            </ul>
        </section>

        <!-- Section 4 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary-800">Your Choices and Rights</h2>
            <p>You have the following rights regarding your data:</p>
            <ul class="list-disc list-inside mb-4 px-4 text-gray-800">
                <li><strong>Access and Correction</strong>: Review and update your personal information.</li>
                <li><strong>Account Deletion</strong>: Request deletion of your account and data.</li>
                <li><strong>Opt-Out</strong>: Unsubscribe from marketing communications.</li>
                <li><strong>Cookies</strong>: Adjust your browser settings to reject cookies.</li>
            </ul>
        </section>

        <!-- Section 5 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary-800">Data Retention</h2>
            <p>We retain your personal data only as long as necessary to fulfill the purposes outlined in this policy or
                as
                required by law. Once no longer needed, your data will be securely deleted or anonymized.</p>
        </section>

        <!-- Section 6 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary-800">Security Measures</h2>
            <p>We implement technical, administrative, and physical safeguards to protect your data. However, no method
                of
                transmission over the Internet is completely secure, and we cannot guarantee absolute security.</p>
        </section>

        <!-- Section 7 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary-800">Third-Party Links</h2>
            <p>Our website may contain links to external websites not operated by us. We are not responsible for the
                content
                or privacy practices of these third-party sites.</p>
        </section>

        <!-- Section 8 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary-800">Updates to This Privacy Policy</h2>
            <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated
                <strong>"Effective Date"</strong>.</p>
        </section>

        <!-- Section 9 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary-800">Contact Us</h2>
            <p>If you have questions about this Privacy Policy or our data practices, please contact us:</p>
            <p class="mt-4">
                <strong>Mapology</strong><br>
                Email: <a href="mailto:{{ config('company.email') }}"
                          class="text-blue-600 hover:underline">{{ config('company.email') }}</a><br>
                Website: <a href="#" class="text-blue-600 hover:underline">www.mapology.eu</a>
            </p>
        </section>
    </div>
</x-layouts.front.base>
