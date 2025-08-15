import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();
// CSS
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css';
import 'datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css';
import 'datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css';

import Swal from 'sweetalert2';
window.Swal = Swal;
// JS
import $ from 'jquery';
window.$ = window.jQuery = $; // Torna disponível globalmente

import DataTable from 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import 'datatables.net-responsive-bs5';
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';
import jszip from 'jszip';
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';

window.JSZip = jszip;

pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.pdfMake = pdfMake;
