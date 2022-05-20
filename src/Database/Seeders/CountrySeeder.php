<?php

namespace Hito\Platform\Database\Seeders;

use Hito\Platform\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [[
            "name" => "Afghanistan", "iso" => "AF", "iso3" => "AFG", "numcode" => 4, "phonecode" => 93], [
            "name" => "Albania", "iso" => "AL", "iso3" => "ALB", "numcode" => 8, "phonecode" => 355], [
            "name" => "Algeria", "iso" => "DZ", "iso3" => "DZA", "numcode" => 12, "phonecode" => 213], [
            "name" => "American Samoa", "iso" => "AS", "iso3" => "ASM", "numcode" => 16, "phonecode" => 1684], [
            "name" => "Andorra", "iso" => "AD", "iso3" => "AND", "numcode" => 20, "phonecode" => 376], [
            "name" => "Angola", "iso" => "AO", "iso3" => "AGO", "numcode" => 24, "phonecode" => 244], [
            "name" => "Anguilla", "iso" => "AI", "iso3" => "AIA", "numcode" => 660, "phonecode" => 1264], [
            "name" => "Antarctica", "iso" => "AQ", "iso3" => null, "numcode" => null, "phonecode" => 0], [
            "name" => "Antigua and Barbuda", "iso" => "AG", "iso3" => "ATG", "numcode" => 28, "phonecode" => 1268], [
            "name" => "Argentina", "iso" => "AR", "iso3" => "ARG", "numcode" => 32, "phonecode" => 54], [
            "name" => "Armenia", "iso" => "AM", "iso3" => "ARM", "numcode" => 51, "phonecode" => 374], [
            "name" => "Aruba", "iso" => "AW", "iso3" => "ABW", "numcode" => 533, "phonecode" => 297], [
            "name" => "Australia", "iso" => "AU", "iso3" => "AUS", "numcode" => 36, "phonecode" => 61], [
            "name" => "Austria", "iso" => "AT", "iso3" => "AUT", "numcode" => 40, "phonecode" => 43], [
            "name" => "Azerbaijan", "iso" => "AZ", "iso3" => "AZE", "numcode" => 31, "phonecode" => 994], [
            "name" => "Bahamas", "iso" => "BS", "iso3" => "BHS", "numcode" => 44, "phonecode" => 1242], [
            "name" => "Bahrain", "iso" => "BH", "iso3" => "BHR", "numcode" => 48, "phonecode" => 973], [
            "name" => "Bangladesh", "iso" => "BD", "iso3" => "BGD", "numcode" => 50, "phonecode" => 880], [
            "name" => "Barbados", "iso" => "BB", "iso3" => "BRB", "numcode" => 52, "phonecode" => 1246], [
            "name" => "Belarus", "iso" => "BY", "iso3" => "BLR", "numcode" => 112, "phonecode" => 375], [
            "name" => "Belgium", "iso" => "BE", "iso3" => "BEL", "numcode" => 56, "phonecode" => 32], [
            "name" => "Belize", "iso" => "BZ", "iso3" => "BLZ", "numcode" => 84, "phonecode" => 501], [
            "name" => "Benin", "iso" => "BJ", "iso3" => "BEN", "numcode" => 204, "phonecode" => 229], [
            "name" => "Bermuda", "iso" => "BM", "iso3" => "BMU", "numcode" => 60, "phonecode" => 1441], [
            "name" => "Bhutan", "iso" => "BT", "iso3" => "BTN", "numcode" => 64, "phonecode" => 975], [
            "name" => "Bolivia", "iso" => "BO", "iso3" => "BOL", "numcode" => 68, "phonecode" => 591], [
            "name" => "Bosnia and Herzegovina", "iso" => "BA", "iso3" => "BIH", "numcode" => 70, "phonecode" => 387], [
            "name" => "Botswana", "iso" => "BW", "iso3" => "BWA", "numcode" => 72, "phonecode" => 267], [
            "name" => "Bouvet Island", "iso" => "BV", "iso3" => null, "numcode" => null, "phonecode" => 0], [
            "name" => "Brazil", "iso" => "BR", "iso3" => "BRA", "numcode" => 76, "phonecode" => 55], [
            "name" => "British Indian Ocean Territory", "iso" => "IO", "iso3" => null, "numcode" => null, "phonecode" => 246], [
            "name" => "Brunei Darussalam", "iso" => "BN", "iso3" => "BRN", "numcode" => 96, "phonecode" => 673], [
            "name" => "Bulgaria", "iso" => "BG", "iso3" => "BGR", "numcode" => 100, "phonecode" => 359], [
            "name" => "Burkina Faso", "iso" => "BF", "iso3" => "BFA", "numcode" => 854, "phonecode" => 226], [
            "name" => "Burundi", "iso" => "BI", "iso3" => "BDI", "numcode" => 108, "phonecode" => 257], [
            "name" => "Cambodia", "iso" => "KH", "iso3" => "KHM", "numcode" => 116, "phonecode" => 855], [
            "name" => "Cameroon", "iso" => "CM", "iso3" => "CMR", "numcode" => 120, "phonecode" => 237], [
            "name" => "Canada", "iso" => "CA", "iso3" => "CAN", "numcode" => 124, "phonecode" => 1], [
            "name" => "Cape Verde", "iso" => "CV", "iso3" => "CPV", "numcode" => 132, "phonecode" => 238], [
            "name" => "Cayman Islands", "iso" => "KY", "iso3" => "CYM", "numcode" => 136, "phonecode" => 1345], [
            "name" => "Central African Republic", "iso" => "CF", "iso3" => "CAF", "numcode" => 140, "phonecode" => 236], [
            "name" => "Chad", "iso" => "TD", "iso3" => "TCD", "numcode" => 148, "phonecode" => 235], [
            "name" => "Chile", "iso" => "CL", "iso3" => "CHL", "numcode" => 152, "phonecode" => 56], [
            "name" => "China", "iso" => "CN", "iso3" => "CHN", "numcode" => 156, "phonecode" => 86], [
            "name" => "Christmas Island", "iso" => "CX", "iso3" => null, "numcode" => null, "phonecode" => 61], [
            "name" => "Cocos (Keeling) Islands", "iso" => "CC", "iso3" => null, "numcode" => null, "phonecode" => 672], [
            "name" => "Colombia", "iso" => "CO", "iso3" => "COL", "numcode" => 170, "phonecode" => 57], [
            "name" => "Comoros", "iso" => "KM", "iso3" => "COM", "numcode" => 174, "phonecode" => 269], [
            "name" => "Congo", "iso" => "CG", "iso3" => "COG", "numcode" => 178, "phonecode" => 242], [
            "name" => "Congo, the Democratic Republic of the", "iso" => "CD", "iso3" => "COD", "numcode" => 180, "phonecode" => 242], [
            "name" => "Cook Islands", "iso" => "CK", "iso3" => "COK", "numcode" => 184, "phonecode" => 682], [
            "name" => "Costa Rica", "iso" => "CR", "iso3" => "CRI", "numcode" => 188, "phonecode" => 506], [
            "name" => "Cote D''Ivoire", "iso" => "CI", "iso3" => "CIV", "numcode" => 384, "phonecode" => 225], [
            "name" => "Croatia", "iso" => "HR", "iso3" => "HRV", "numcode" => 191, "phonecode" => 385], [
            "name" => "Cuba", "iso" => "CU", "iso3" => "CUB", "numcode" => 192, "phonecode" => 53], [
            "name" => "Cyprus", "iso" => "CY", "iso3" => "CYP", "numcode" => 196, "phonecode" => 357], [
            "name" => "Czech Republic", "iso" => "CZ", "iso3" => "CZE", "numcode" => 203, "phonecode" => 420], [
            "name" => "Denmark", "iso" => "DK", "iso3" => "DNK", "numcode" => 208, "phonecode" => 45], [
            "name" => "Djibouti", "iso" => "DJ", "iso3" => "DJI", "numcode" => 262, "phonecode" => 253], [
            "name" => "Dominica", "iso" => "DM", "iso3" => "DMA", "numcode" => 212, "phonecode" => 1767], [
            "name" => "Dominican Republic", "iso" => "DO", "iso3" => "DOM", "numcode" => 214, "phonecode" => 1809], [
            "name" => "Ecuador", "iso" => "EC", "iso3" => "ECU", "numcode" => 218, "phonecode" => 593], [
            "name" => "Egypt", "iso" => "EG", "iso3" => "EGY", "numcode" => 818, "phonecode" => 20], [
            "name" => "El Salvador", "iso" => "SV", "iso3" => "SLV", "numcode" => 222, "phonecode" => 503], [
            "name" => "Equatorial Guinea", "iso" => "GQ", "iso3" => "GNQ", "numcode" => 226, "phonecode" => 240], [
            "name" => "Eritrea", "iso" => "ER", "iso3" => "ERI", "numcode" => 232, "phonecode" => 291], [
            "name" => "Estonia", "iso" => "EE", "iso3" => "EST", "numcode" => 233, "phonecode" => 372], [
            "name" => "Ethiopia", "iso" => "ET", "iso3" => "ETH", "numcode" => 231, "phonecode" => 251], [
            "name" => "Falkland Islands (Malvinas)", "iso" => "FK", "iso3" => "FLK", "numcode" => 238, "phonecode" => 500], [
            "name" => "Faroe Islands", "iso" => "FO", "iso3" => "FRO", "numcode" => 234, "phonecode" => 298], [
            "name" => "Fiji", "iso" => "FJ", "iso3" => "FJI", "numcode" => 242, "phonecode" => 679], [
            "name" => "Finland", "iso" => "FI", "iso3" => "FIN", "numcode" => 246, "phonecode" => 358], [
            "name" => "France", "iso" => "FR", "iso3" => "FRA", "numcode" => 250, "phonecode" => 33], [
            "name" => "French Guiana", "iso" => "GF", "iso3" => "GUF", "numcode" => 254, "phonecode" => 594], [
            "name" => "French Polynesia", "iso" => "PF", "iso3" => "PYF", "numcode" => 258, "phonecode" => 689], [
            "name" => "French Southern Territories", "iso" => "TF", "iso3" => null, "numcode" => null, "phonecode" => 0], [
            "name" => "Gabon", "iso" => "GA", "iso3" => "GAB", "numcode" => 266, "phonecode" => 241], [
            "name" => "Gambia", "iso" => "GM", "iso3" => "GMB", "numcode" => 270, "phonecode" => 220], [
            "name" => "Georgia", "iso" => "GE", "iso3" => "GEO", "numcode" => 268, "phonecode" => 995], [
            "name" => "Germany", "iso" => "DE", "iso3" => "DEU", "numcode" => 276, "phonecode" => 49], [
            "name" => "Ghana", "iso" => "GH", "iso3" => "GHA", "numcode" => 288, "phonecode" => 233], [
            "name" => "Gibraltar", "iso" => "GI", "iso3" => "GIB", "numcode" => 292, "phonecode" => 350], [
            "name" => "Greece", "iso" => "GR", "iso3" => "GRC", "numcode" => 300, "phonecode" => 30], [
            "name" => "Greenland", "iso" => "GL", "iso3" => "GRL", "numcode" => 304, "phonecode" => 299], [
            "name" => "Grenada", "iso" => "GD", "iso3" => "GRD", "numcode" => 308, "phonecode" => 1473], [
            "name" => "Guadeloupe", "iso" => "GP", "iso3" => "GLP", "numcode" => 312, "phonecode" => 590], [
            "name" => "Guam", "iso" => "GU", "iso3" => "GUM", "numcode" => 316, "phonecode" => 1671], [
            "name" => "Guatemala", "iso" => "GT", "iso3" => "GTM", "numcode" => 320, "phonecode" => 502], [
            "name" => "Guinea", "iso" => "GN", "iso3" => "GIN", "numcode" => 324, "phonecode" => 224], [
            "name" => "Guinea-Bissau", "iso" => "GW", "iso3" => "GNB", "numcode" => 624, "phonecode" => 245], [
            "name" => "Guyana", "iso" => "GY", "iso3" => "GUY", "numcode" => 328, "phonecode" => 592], [
            "name" => "Haiti", "iso" => "HT", "iso3" => "HTI", "numcode" => 332, "phonecode" => 509], [
            "name" => "Heard Island and Mcdonald Islands", "iso" => "HM", "iso3" => null, "numcode" => null, "phonecode" => 0], [
            "name" => "Holy See (Vatican City State)", "iso" => "VA", "iso3" => "VAT", "numcode" => 336, "phonecode" => 39], [
            "name" => "Honduras", "iso" => "HN", "iso3" => "HND", "numcode" => 340, "phonecode" => 504], [
            "name" => "Hong Kong", "iso" => "HK", "iso3" => "HKG", "numcode" => 344, "phonecode" => 852], [
            "name" => "Hungary", "iso" => "HU", "iso3" => "HUN", "numcode" => 348, "phonecode" => 36], [
            "name" => "Iceland", "iso" => "IS", "iso3" => "ISL", "numcode" => 352, "phonecode" => 354], [
            "name" => "India", "iso" => "IN", "iso3" => "IND", "numcode" => 356, "phonecode" => 91], [
            "name" => "Indonesia", "iso" => "ID", "iso3" => "IDN", "numcode" => 360, "phonecode" => 62], [
            "name" => "Iran, Islamic Republic of", "iso" => "IR", "iso3" => "IRN", "numcode" => 364, "phonecode" => 98], [
            "name" => "Iraq", "iso" => "IQ", "iso3" => "IRQ", "numcode" => 368, "phonecode" => 964], [
            "name" => "Ireland", "iso" => "IE", "iso3" => "IRL", "numcode" => 372, "phonecode" => 353], [
            "name" => "Israel", "iso" => "IL", "iso3" => "ISR", "numcode" => 376, "phonecode" => 972], [
            "name" => "Italy", "iso" => "IT", "iso3" => "ITA", "numcode" => 380, "phonecode" => 39], [
            "name" => "Jamaica", "iso" => "JM", "iso3" => "JAM", "numcode" => 388, "phonecode" => 1876], [
            "name" => "Japan", "iso" => "JP", "iso3" => "JPN", "numcode" => 392, "phonecode" => 81], [
            "name" => "Jordan", "iso" => "JO", "iso3" => "JOR", "numcode" => 400, "phonecode" => 962], [
            "name" => "Kazakhstan", "iso" => "KZ", "iso3" => "KAZ", "numcode" => 398, "phonecode" => 7], [
            "name" => "Kenya", "iso" => "KE", "iso3" => "KEN", "numcode" => 404, "phonecode" => 254], [
            "name" => "Kiribati", "iso" => "KI", "iso3" => "KIR", "numcode" => 296, "phonecode" => 686], [
            "name" => "Korea, Democratic People''s Republic of", "iso" => "KP", "iso3" => "PRK", "numcode" => 408, "phonecode" => 850], [
            "name" => "Korea, Republic of", "iso" => "KR", "iso3" => "KOR", "numcode" => 410, "phonecode" => 82], [
            "name" => "Kuwait", "iso" => "KW", "iso3" => "KWT", "numcode" => 414, "phonecode" => 965], [
            "name" => "Kyrgyzstan", "iso" => "KG", "iso3" => "KGZ", "numcode" => 417, "phonecode" => 996], [
            "name" => "Lao People''s Democratic Republic", "iso" => "LA", "iso3" => "LAO", "numcode" => 418, "phonecode" => 856], [
            "name" => "Latvia", "iso" => "LV", "iso3" => "LVA", "numcode" => 428, "phonecode" => 371], [
            "name" => "Lebanon", "iso" => "LB", "iso3" => "LBN", "numcode" => 422, "phonecode" => 961], [
            "name" => "Lesotho", "iso" => "LS", "iso3" => "LSO", "numcode" => 426, "phonecode" => 266], [
            "name" => "Liberia", "iso" => "LR", "iso3" => "LBR", "numcode" => 430, "phonecode" => 231], [
            "name" => "Libyan Arab Jamahiriya", "iso" => "LY", "iso3" => "LBY", "numcode" => 434, "phonecode" => 218], [
            "name" => "Liechtenstein", "iso" => "LI", "iso3" => "LIE", "numcode" => 438, "phonecode" => 423], [
            "name" => "Lithuania", "iso" => "LT", "iso3" => "LTU", "numcode" => 440, "phonecode" => 370], [
            "name" => "Luxembourg", "iso" => "LU", "iso3" => "LUX", "numcode" => 442, "phonecode" => 352], [
            "name" => "Macao", "iso" => "MO", "iso3" => "MAC", "numcode" => 446, "phonecode" => 853], [
            "name" => "Macedonia, the Former Yugoslav Republic of", "iso" => "MK", "iso3" => "MKD", "numcode" => 807, "phonecode" => 389], [
            "name" => "Madagascar", "iso" => "MG", "iso3" => "MDG", "numcode" => 450, "phonecode" => 261], [
            "name" => "Malawi", "iso" => "MW", "iso3" => "MWI", "numcode" => 454, "phonecode" => 265], [
            "name" => "Malaysia", "iso" => "MY", "iso3" => "MYS", "numcode" => 458, "phonecode" => 60], [
            "name" => "Maldives", "iso" => "MV", "iso3" => "MDV", "numcode" => 462, "phonecode" => 960], [
            "name" => "Mali", "iso" => "ML", "iso3" => "MLI", "numcode" => 466, "phonecode" => 223], [
            "name" => "Malta", "iso" => "MT", "iso3" => "MLT", "numcode" => 470, "phonecode" => 356], [
            "name" => "Marshall Islands", "iso" => "MH", "iso3" => "MHL", "numcode" => 584, "phonecode" => 692], [
            "name" => "Martinique", "iso" => "MQ", "iso3" => "MTQ", "numcode" => 474, "phonecode" => 596], [
            "name" => "Mauritania", "iso" => "MR", "iso3" => "MRT", "numcode" => 478, "phonecode" => 222], [
            "name" => "Mauritius", "iso" => "MU", "iso3" => "MUS", "numcode" => 480, "phonecode" => 230], [
            "name" => "Mayotte", "iso" => "YT", "iso3" => null, "numcode" => null, "phonecode" => 269], [
            "name" => "Mexico", "iso" => "MX", "iso3" => "MEX", "numcode" => 484, "phonecode" => 52], [
            "name" => "Micronesia, Federated States of", "iso" => "FM", "iso3" => "FSM", "numcode" => 583, "phonecode" => 691], [
            "name" => "Moldova, Republic of", "iso" => "MD", "iso3" => "MDA", "numcode" => 498, "phonecode" => 373], [
            "name" => "Monaco", "iso" => "MC", "iso3" => "MCO", "numcode" => 492, "phonecode" => 377], [
            "name" => "Mongolia", "iso" => "MN", "iso3" => "MNG", "numcode" => 496, "phonecode" => 976], [
            "name" => "Montserrat", "iso" => "MS", "iso3" => "MSR", "numcode" => 500, "phonecode" => 1664], [
            "name" => "Morocco", "iso" => "MA", "iso3" => "MAR", "numcode" => 504, "phonecode" => 212], [
            "name" => "Mozambique", "iso" => "MZ", "iso3" => "MOZ", "numcode" => 508, "phonecode" => 258], [
            "name" => "Myanmar", "iso" => "MM", "iso3" => "MMR", "numcode" => 104, "phonecode" => 95], [
            "name" => "Namibia", "iso" => "NA", "iso3" => "NAM", "numcode" => 516, "phonecode" => 264], [
            "name" => "Nauru", "iso" => "NR", "iso3" => "NRU", "numcode" => 520, "phonecode" => 674], [
            "name" => "Nepal", "iso" => "NP", "iso3" => "NPL", "numcode" => 524, "phonecode" => 977], [
            "name" => "Netherlands", "iso" => "NL", "iso3" => "NLD", "numcode" => 528, "phonecode" => 31], [
            "name" => "Netherlands Antilles", "iso" => "AN", "iso3" => "ANT", "numcode" => 530, "phonecode" => 599], [
            "name" => "New Caledonia", "iso" => "NC", "iso3" => "NCL", "numcode" => 540, "phonecode" => 687], [
            "name" => "New Zealand", "iso" => "NZ", "iso3" => "NZL", "numcode" => 554, "phonecode" => 64], [
            "name" => "Nicaragua", "iso" => "NI", "iso3" => "NIC", "numcode" => 558, "phonecode" => 505], [
            "name" => "Niger", "iso" => "NE", "iso3" => "NER", "numcode" => 562, "phonecode" => 227], [
            "name" => "Nigeria", "iso" => "NG", "iso3" => "NGA", "numcode" => 566, "phonecode" => 234], [
            "name" => "Niue", "iso" => "NU", "iso3" => "NIU", "numcode" => 570, "phonecode" => 683], [
            "name" => "Norfolk Island", "iso" => "NF", "iso3" => "NFK", "numcode" => 574, "phonecode" => 672], [
            "name" => "Northern Mariana Islands", "iso" => "MP", "iso3" => "MNP", "numcode" => 580, "phonecode" => 1670], [
            "name" => "Norway", "iso" => "NO", "iso3" => "NOR", "numcode" => 578, "phonecode" => 47], [
            "name" => "Oman", "iso" => "OM", "iso3" => "OMN", "numcode" => 512, "phonecode" => 968], [
            "name" => "Pakistan", "iso" => "PK", "iso3" => "PAK", "numcode" => 586, "phonecode" => 92], [
            "name" => "Palau", "iso" => "PW", "iso3" => "PLW", "numcode" => 585, "phonecode" => 680], [
            "name" => "Palestinian Territory, Occupied", "iso" => "PS", "iso3" => null, "numcode" => null, "phonecode" => 970], [
            "name" => "Panama", "iso" => "PA", "iso3" => "PAN", "numcode" => 591, "phonecode" => 507], [
            "name" => "Papua New Guinea", "iso" => "PG", "iso3" => "PNG", "numcode" => 598, "phonecode" => 675], [
            "name" => "Paraguay", "iso" => "PY", "iso3" => "PRY", "numcode" => 600, "phonecode" => 595], [
            "name" => "Peru", "iso" => "PE", "iso3" => "PER", "numcode" => 604, "phonecode" => 51], [
            "name" => "Philippines", "iso" => "PH", "iso3" => "PHL", "numcode" => 608, "phonecode" => 63], [
            "name" => "Pitcairn", "iso" => "PN", "iso3" => "PCN", "numcode" => 612, "phonecode" => 0], [
            "name" => "Poland", "iso" => "PL", "iso3" => "POL", "numcode" => 616, "phonecode" => 48], [
            "name" => "Portugal", "iso" => "PT", "iso3" => "PRT", "numcode" => 620, "phonecode" => 351], [
            "name" => "Puerto Rico", "iso" => "PR", "iso3" => "PRI", "numcode" => 630, "phonecode" => 1787], [
            "name" => "Qatar", "iso" => "QA", "iso3" => "QAT", "numcode" => 634, "phonecode" => 974], [
            "name" => "Reunion", "iso" => "RE", "iso3" => "REU", "numcode" => 638, "phonecode" => 262], [
            "name" => "Romania", "iso" => "RO", "iso3" => "ROM", "numcode" => 642, "phonecode" => 40], [
            "name" => "Russian Federation", "iso" => "RU", "iso3" => "RUS", "numcode" => 643, "phonecode" => 70], [
            "name" => "Rwanda", "iso" => "RW", "iso3" => "RWA", "numcode" => 646, "phonecode" => 250], [
            "name" => "Saint Helena", "iso" => "SH", "iso3" => "SHN", "numcode" => 654, "phonecode" => 290], [
            "name" => "Saint Kitts and Nevis", "iso" => "KN", "iso3" => "KNA", "numcode" => 659, "phonecode" => 1869], [
            "name" => "Saint Lucia", "iso" => "LC", "iso3" => "LCA", "numcode" => 662, "phonecode" => 1758], [
            "name" => "Saint Pierre and Miquelon", "iso" => "PM", "iso3" => "SPM", "numcode" => 666, "phonecode" => 508], [
            "name" => "Saint Vincent and the Grenadines", "iso" => "VC", "iso3" => "VCT", "numcode" => 670, "phonecode" => 1784], [
            "name" => "Samoa", "iso" => "WS", "iso3" => "WSM", "numcode" => 882, "phonecode" => 684], [
            "name" => "San Marino", "iso" => "SM", "iso3" => "SMR", "numcode" => 674, "phonecode" => 378], [
            "name" => "Sao Tome and Principe", "iso" => "ST", "iso3" => "STP", "numcode" => 678, "phonecode" => 239], [
            "name" => "Saudi Arabia", "iso" => "SA", "iso3" => "SAU", "numcode" => 682, "phonecode" => 966], [
            "name" => "Senegal", "iso" => "SN", "iso3" => "SEN", "numcode" => 686, "phonecode" => 221], [
            "name" => "Serbia and Montenegro", "iso" => "CS", "iso3" => null, "numcode" => null, "phonecode" => 381], [
            "name" => "Seychelles", "iso" => "SC", "iso3" => "SYC", "numcode" => 690, "phonecode" => 248], [
            "name" => "Sierra Leone", "iso" => "SL", "iso3" => "SLE", "numcode" => 694, "phonecode" => 232], [
            "name" => "Singapore", "iso" => "SG", "iso3" => "SGP", "numcode" => 702, "phonecode" => 65], [
            "name" => "Slovakia", "iso" => "SK", "iso3" => "SVK", "numcode" => 703, "phonecode" => 421], [
            "name" => "Slovenia", "iso" => "SI", "iso3" => "SVN", "numcode" => 705, "phonecode" => 386], [
            "name" => "Solomon Islands", "iso" => "SB", "iso3" => "SLB", "numcode" => 90, "phonecode" => 677], [
            "name" => "Somalia", "iso" => "SO", "iso3" => "SOM", "numcode" => 706, "phonecode" => 252], [
            "name" => "South Africa", "iso" => "ZA", "iso3" => "ZAF", "numcode" => 710, "phonecode" => 27], [
            "name" => "South Georgia and the South Sandwich Islands", "iso" => "GS", "iso3" => null, "numcode" => null, "phonecode" => 0], [
            "name" => "Spain", "iso" => "ES", "iso3" => "ESP", "numcode" => 724, "phonecode" => 34], [
            "name" => "Sri Lanka", "iso" => "LK", "iso3" => "LKA", "numcode" => 144, "phonecode" => 94], [
            "name" => "Sudan", "iso" => "SD", "iso3" => "SDN", "numcode" => 736, "phonecode" => 249], [
            "name" => "Suriname", "iso" => "SR", "iso3" => "SUR", "numcode" => 740, "phonecode" => 597], [
            "name" => "Svalbard and Jan Mayen", "iso" => "SJ", "iso3" => "SJM", "numcode" => 744, "phonecode" => 47], [
            "name" => "Swaziland", "iso" => "SZ", "iso3" => "SWZ", "numcode" => 748, "phonecode" => 268], [
            "name" => "Sweden", "iso" => "SE", "iso3" => "SWE", "numcode" => 752, "phonecode" => 46], [
            "name" => "Switzerland", "iso" => "CH", "iso3" => "CHE", "numcode" => 756, "phonecode" => 41], [
            "name" => "Syrian Arab Republic", "iso" => "SY", "iso3" => "SYR", "numcode" => 760, "phonecode" => 963], [
            "name" => "Taiwan, Province of China", "iso" => "TW", "iso3" => "TWN", "numcode" => 158, "phonecode" => 886], [
            "name" => "Tajikistan", "iso" => "TJ", "iso3" => "TJK", "numcode" => 762, "phonecode" => 992], [
            "name" => "Tanzania, United Republic of", "iso" => "TZ", "iso3" => "TZA", "numcode" => 834, "phonecode" => 255], [
            "name" => "Thailand", "iso" => "TH", "iso3" => "THA", "numcode" => 764, "phonecode" => 66], [
            "name" => "Timor-Leste", "iso" => "TL", "iso3" => null, "numcode" => null, "phonecode" => 670], [
            "name" => "Togo", "iso" => "TG", "iso3" => "TGO", "numcode" => 768, "phonecode" => 228], [
            "name" => "Tokelau", "iso" => "TK", "iso3" => "TKL", "numcode" => 772, "phonecode" => 690], [
            "name" => "Tonga", "iso" => "TO", "iso3" => "TON", "numcode" => 776, "phonecode" => 676], [
            "name" => "Trinidad and Tobago", "iso" => "TT", "iso3" => "TTO", "numcode" => 780, "phonecode" => 1868], [
            "name" => "Tunisia", "iso" => "TN", "iso3" => "TUN", "numcode" => 788, "phonecode" => 216], [
            "name" => "Turkey", "iso" => "TR", "iso3" => "TUR", "numcode" => 792, "phonecode" => 90], [
            "name" => "Turkmenistan", "iso" => "TM", "iso3" => "TKM", "numcode" => 795, "phonecode" => 7370], [
            "name" => "Turks and Caicos Islands", "iso" => "TC", "iso3" => "TCA", "numcode" => 796, "phonecode" => 1649], [
            "name" => "Tuvalu", "iso" => "TV", "iso3" => "TUV", "numcode" => 798, "phonecode" => 688], [
            "name" => "Uganda", "iso" => "UG", "iso3" => "UGA", "numcode" => 800, "phonecode" => 256], [
            "name" => "Ukraine", "iso" => "UA", "iso3" => "UKR", "numcode" => 804, "phonecode" => 380], [
            "name" => "United Arab Emirates", "iso" => "AE", "iso3" => "ARE", "numcode" => 784, "phonecode" => 971], [
            "name" => "United Kingdom", "iso" => "GB", "iso3" => "GBR", "numcode" => 826, "phonecode" => 44], [
            "name" => "United States", "iso" => "US", "iso3" => "USA", "numcode" => 840, "phonecode" => 1], [
            "name" => "United States Minor Outlying Islands", "iso" => "UM", "iso3" => null, "numcode" => null, "phonecode" => 1], [
            "name" => "Uruguay", "iso" => "UY", "iso3" => "URY", "numcode" => 858, "phonecode" => 598], [
            "name" => "Uzbekistan", "iso" => "UZ", "iso3" => "UZB", "numcode" => 860, "phonecode" => 998], [
            "name" => "Vanuatu", "iso" => "VU", "iso3" => "VUT", "numcode" => 548, "phonecode" => 678], [
            "name" => "Venezuela", "iso" => "VE", "iso3" => "VEN", "numcode" => 862, "phonecode" => 58], [
            "name" => "Viet Nam", "iso" => "VN", "iso3" => "VNM", "numcode" => 704, "phonecode" => 84], [
            "name" => "Virgin Islands, British", "iso" => "VG", "iso3" => "VGB", "numcode" => 92, "phonecode" => 1284], [
            "name" => "Virgin Islands, U.s.", "iso" => "VI", "iso3" => "VIR", "numcode" => 850, "phonecode" => 1340], [
            "name" => "Wallis and Futuna", "iso" => "WF", "iso3" => "WLF", "numcode" => 876, "phonecode" => 681], [
            "name" => "Western Sahara", "iso" => "EH", "iso3" => "ESH", "numcode" => 732, "phonecode" => 212], [
            "name" => "Yemen", "iso" => "YE", "iso3" => "YEM", "numcode" => 887, "phonecode" => 967], [
            "name" => "Zambia", "iso" => "ZM", "iso3" => "ZMB", "numcode" => 894, "phonecode" => 260], [
            "name" => "Zimbabwe", "iso" => "ZW", "iso3" => "ZWE", "numcode" => 716, "phonecode" => 263]];

        foreach ($countries as $country) {
            Country::firstOrCreate($country);
        }
    }
}
