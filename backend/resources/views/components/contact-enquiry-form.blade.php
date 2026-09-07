@props([
    'ownerNumber' => config('services.whatsapp.owner_number', env('WHATSAPP_OWNER_NUMBER', '919158141414'))
])

<div class="visawa-contact-form-wrapper" id="visawaContactFormWrapper">
    {{-- Success Alert (Stays Visible) --}}
    <div id="visawaSuccessAlert" class="hidden mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-300 text-emerald-900">
        <div class="flex items-center gap-3">
            <span class="text-2xl">✅</span>
            <div>
                <h4 class="font-bold text-sm" id="visawaSuccessTitle">चौकशी यशस्वीरित्या पाठवली!</h4>
                <p class="text-xs text-emerald-800" id="visawaSuccessMessage">धन्यवाद! आमची टीम लवकरच तुमच्याशी संपर्क साधेल आणि व्हॉट्सॲप चॅट उघडले आहे.</p>
            </div>
        </div>
    </div>

    {{-- Error Alert --}}
    <div id="visawaErrorAlert" class="hidden mb-6 p-4 rounded-xl bg-rose-50 border border-rose-300 text-rose-900">
        <div class="flex items-center gap-3">
            <span class="text-2xl">⚠️</span>
            <div>
                <h4 class="font-bold text-sm" id="visawaErrorTitle">त्रुटी आली</h4>
                <p class="text-xs text-rose-800" id="visawaErrorMessage">कृपया सर्व आवश्यक माहिती योग्यरित्या प्रविष्ट करा.</p>
            </div>
        </div>
    </div>

    {{-- The Contact / Enquiry Form --}}
    <form id="visawaEnquiryForm" action="{{ url('/api/v1/enquiries') }}" method="POST" class="space-y-4">
        @csrf
        
        <div>
            <label for="enquiry_name" class="block text-xs font-bold text-stone-700 mb-1" id="lbl_name">
                पूर्ण नाव (Full Name) <span class="text-rose-600">*</span>
            </label>
            <input 
                type="text" 
                id="enquiry_name" 
                name="name" 
                required 
                placeholder="उदा. राहुल पाटील / e.g. Rahul Patil"
                class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 text-sm outline-none transition">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="enquiry_email" class="block text-xs font-bold text-stone-700 mb-1" id="lbl_email">
                    ईमेल पत्ता (Email Address) <span class="text-rose-600">*</span>
                </label>
                <input 
                    type="email" 
                    id="enquiry_email" 
                    name="email" 
                    required 
                    placeholder="उदा. rahul@example.com"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 text-sm outline-none transition">
            </div>
            <div>
                <label for="enquiry_phone" class="block text-xs font-bold text-stone-700 mb-1" id="lbl_phone">
                    मोबाईल क्रमांक (Mobile Number)
                </label>
                <input 
                    type="tel" 
                    id="enquiry_phone" 
                    name="phone" 
                    placeholder="उदा. 9158141414"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 text-sm outline-none transition">
            </div>
        </div>

        <div>
            <label for="enquiry_subject" class="block text-xs font-bold text-stone-700 mb-1" id="lbl_subject">
                भेटीचा उद्देश (Purpose of Visit / Subject)
            </label>
            <input 
                type="text" 
                id="enquiry_subject" 
                name="subject" 
                placeholder="उदा. कौटुंबिक डे-पिकनिक / Family Day Picnic"
                class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 text-sm outline-none transition">
        </div>

        <div>
            <label for="enquiry_message" class="block text-xs font-bold text-stone-700 mb-1" id="lbl_message">
                चौकशीचा तपशील (Message / Inquiry Details) <span class="text-rose-600">*</span>
            </label>
            <textarea 
                id="enquiry_message" 
                name="message" 
                rows="4" 
                required 
                placeholder="तारीख, पाहुण्यांची संख्या व इतर गरजा नमूद करा..."
                class="w-full px-4 py-2.5 rounded-xl border border-stone-300 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 text-sm outline-none transition"></textarea>
        </div>

        <button 
            type="submit" 
            id="visawaSubmitBtn"
            class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-amber-500 via-amber-600 to-orange-600 hover:from-amber-400 hover:to-orange-500 text-stone-950 font-black text-sm shadow-md transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
            <span id="visawaBtnText">चौकशी पाठवा (Send Enquiry)</span>
            <span>➔</span>
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('visawaEnquiryForm');
    const submitBtn = document.getElementById('visawaSubmitBtn');
    const btnText = document.getElementById('visawaBtnText');
    const successAlert = document.getElementById('visawaSuccessAlert');
    const errorAlert = document.getElementById('visawaErrorAlert');
    const errorMessage = document.getElementById('visawaErrorMessage');

    if (!form) return;

    // Configured Owner Number
    const rawOwnerNumber = '{{ $ownerNumber }}' || '919158141414';
    const digitsOnly = rawOwnerNumber.replace(/\D/g, '');
    const ownerNumber = digitsOnly.length === 10 ? '91' + digitsOnly : (digitsOnly || '919158141414');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        // 1. Language Detection from localStorage (Default: 'mr')
        const currentLang = localStorage.getItem('selectedLanguage') || 'mr';
        const isMarathi = currentLang === 'mr';

        // 2. Read Form Values
        const name = (document.getElementById('enquiry_name').value || '').trim();
        const email = (document.getElementById('enquiry_email').value || '').trim();
        const phone = (document.getElementById('enquiry_phone').value || '').trim();
        const subject = (document.getElementById('enquiry_subject').value || '').trim();
        const message = (document.getElementById('enquiry_message').value || '').trim();

        if (!name || !email || !message) {
            errorAlert.classList.remove('hidden');
            errorMessage.textContent = isMarathi 
                ? 'कृपया आवश्यक माहिती प्रविष्ट करा.' 
                : 'Please fill in all required fields.';
            return;
        }

        // 3. UI Loading State
        submitBtn.disabled = true;
        btnText.textContent = isMarathi ? 'पाठवत आहे...' : 'Sending...';
        errorAlert.classList.add('hidden');

        try {
            // 4. Save Enquiry to Existing Laravel Database
            const response = await fetch(form.action + '?lang=' + encodeURIComponent(currentLang), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    phone: phone,
                    subject: subject,
                    message: message
                })
            });

            const resData = await response.json();

            if (response.ok && resData.success) {
                // 5. Build Bilingual WhatsApp Message
                let waMessage = '';
                if (isMarathi) {
                    waMessage = `*विसावा कृषी पर्यटन व रिसॉर्ट*\n\n` +
                        `*नवीन चौकशी*\n\n` +
                        `*ग्राहकाचे नाव:* ${name || '-'}\n` +
                        `*मोबाईल क्रमांक:* ${phone || '-'}\n` +
                        `*ईमेल:* ${email || '-'}\n` +
                        `*भेटीचा उद्देश:* ${subject || 'सामान्य चौकशी'}\n\n` +
                        `*चौकशीचा तपशील:*\n` +
                        `${message || '-'}\n\n` +
                        `*धन्यवाद.*`;
                } else {
                    waMessage = `*VISAWA AGRO TOURISM & RESORT*\n\n` +
                        `*A New Enquiry Has Been Received*\n\n` +
                        `*Customer Name:* ${name || '-'}\n` +
                        `*Mobile Number:* ${phone || '-'}\n` +
                        `*Email Address:* ${email || '-'}\n` +
                        `*Purpose of Visit:* ${subject || 'General Enquiry'}\n\n` +
                        `*Enquiry Details:*\n` +
                        `${message || '-'}\n\n` +
                        `*Thank You.*`;
                }

                // 6. Automatically Open WhatsApp in New Tab
                const targetOwner = resData.whatsapp?.owner_number || ownerNumber;
                const whatsappUrl = `https://wa.me/${targetOwner}?text=${encodeURIComponent(waMessage)}`;
                
                try {
                    window.open(whatsappUrl, '_blank');
                } catch (err) {
                    console.error('Failed to open WhatsApp window:', err);
                }

                // 7. Show Success and Reset Form
                successAlert.classList.remove('hidden');
                form.reset();
            } else {
                errorAlert.classList.remove('hidden');
                errorMessage.textContent = resData.message || (isMarathi ? 'त्रुटी आली. कृपया पुन्हा प्रयत्न करा.' : 'Submission failed. Please try again.');
            }
        } catch (error) {
            errorAlert.classList.remove('hidden');
            errorMessage.textContent = isMarathi 
                ? 'सर्व्हरशी संपर्क करताना त्रुटी आली.' 
                : 'A network error occurred. Please try again.';
        } finally {
            submitBtn.disabled = false;
            btnText.textContent = isMarathi ? 'चौकशी पाठवा (Send Enquiry)' : 'Send Enquiry';
        }
    });
});
</script>
