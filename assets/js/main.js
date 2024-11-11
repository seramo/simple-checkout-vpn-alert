document.addEventListener("DOMContentLoaded", function() {
    fetch('https://www.cloudflare.com/cdn-cgi/trace')
        .then(response => response.text())
        .then(data => {
            const locRegex = /loc=(.+)/;
            const warpRegex = /warp=(.+)/;
            const locMatch = data.match(locRegex);
            const warpMatch = data.match(warpRegex);
            if (locMatch && locMatch[1] && warpMatch && warpMatch[1]) {
                const userCountry = locMatch[1].trim();
                const warpStatus = warpMatch[1].trim();
                if (userCountry !== "IR" || warpStatus !== "off") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'توجه!',
                        html: '<span>لطفاً برای جلوگیری از بروز هرگونه مشکل در فرآیند پرداخت، پیش از ورود به درگاه بانکی، VPN خود را غیرفعال نمایید.</span>',
                        confirmButtonText: 'تایید',
                        allowOutsideClick: false
                    });
                }
            }
        });
});