function printElement($element, options = {}) {
    const defaults = {
        company: 'প্রতিষ্ঠানের নাম',
        address: 'প্রতিষ্ঠানের ঠিকানা',
        title: 'প্রিন্ট ডকুমেন্ট',
        orientation: 'portrait', // landscape
        header: true,
        footer: false,
        printTime: true
    };
    
    const settings = {...defaults, ...options};
    const printContent = $element.clone();
    
    // প্রিন্ট উইন্ডো তৈরি
    const printWindow = window.open('', '_blank');
    
    // হেডার যোগ
    if (settings.header) {
        printContent.prepend(`
            <div class="header">
                <h3 class="company">${settings.company}</h3>
                <p class="address">${settings.address}</p>
                <h2 class="report-title">${settings.title}</h2>`);
        if (settings.printTime) {
            printContent.append(`
                <p class="print-date">Print Date: ${new Date().toLocaleString()}</p>
            `);
        }
        printContent.append(`
            </div>
        `);
    }
    //প্রিন্ট তারিখ: ${new Date().toLocaleDateString('bn-BD')}</p>
    // ফুটার যোগ
    if (settings.footer) {
        let footerContent = `
            <div class="footer" style="text-align: center; margin-top: 5px; position: relative;">
                <div style="border-top: 1px solid #000; padding-top: 5px;">
                    <p style="margin-bottom: 5px;">Print Date: ${new Date().toLocaleString()}</p>
                </div>
            </div>`;
        printContent.append(footerContent);
    }
    
    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>${settings.title}</title>
            <style>
                body { font-family: Arial; margin: 10px; font-size: 12px; }
                .header { text-align: center; 
                    border-bottom: 2px solid #252525ff; 
                    padding-bottom: 5px; 
                    position: relative;
                    margin-bottom: 7px; 
                }
                h1, h2, h3 { margin: 0; }
                p { margin: 0; }
                .company { font-size: 20px; font-weight: bold; }
                .address { font-size: 14px; margin-top: 5px; }
                .report-title { font-size: 18px; font-weight: bold; margin-top: 5px; }
                .print-date {
                    position: absolute;
                    right: 5px;
                    bottom: 5px;
                    text-align: right;
                    font-size: 12px; margin-top: 5px; 
                 }
                .text-right { text-align: right; }
                .text-center { text-align: center; }
                .text-bold { font-weight: bold; }
                .text-underline { text-decoration: underline; }
                .text-italic { font-style: italic; }
                .text-uppercase { text-transform: uppercase; }
                .text-lowercase { text-transform: lowercase; }
                .text-capitalize { text-transform: capitalize; }
                table { width: 100%; border-collapse: collapse; }
                th, td { 
                    border: 1px solid #000; 
                    padding: 2px; 
                }
                .d-print-none { display: none; }
                @page {
                    size: ${settings.orientation === 'landscape' ? 'A4 landscape' : 'A4 portrait'};
                    @bottom-center {
                        content: "Page " counter(page) " of " counter(pages);
                        font-family: Arial;
                        font-size: 10px;
                    }
                }
            </style>
        </head>
        <body>
            ${printContent.html()}
        </body>
        </html>
    `);
    
    printWindow.document.close();
    printWindow.focus();
    
    // স্বয়ংক্রিয় প্রিন্ট
    setTimeout(() => {
        printWindow.print();
        printWindow.close();
    }, 500);
}