<?php

namespace Slub\Dfgviewer\Common;

/**
 * Copyright notice
 *
 * (c) Saxon State and University Library Dresden <typo3@slub-dresden.de>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 */

/**
 * The iso script helper contains functions to handle ISO 15924.
 *
 * @package TYPO3
 * @subpackage dfg-viewer
 *
 * @access public
 */
class IsoScriptHelper
{
    /*
     *  Array based on the ISO 15924 code standard from Unicode (https://unicode.org/iso15924/iso15924-codes.html).
     *
     *  Each element of the array uses an ISO 15924 code as its key and contains an array with the number as the first value and, as the second, an array with English and French.
     */
    public const array ISO_15924 = [
        'Adlm' => ['166', ['Adlam', 'adlam']],
        'Afak' => ['439', ['Afaka', 'afaka']],
        'Aghb' => ['239', ['Caucasian Albanian', 'aghbanien']],
        'Ahom' => ['338', ['Ahom, Tai Ahom', 'âhom']],
        'Arab' => ['160', ['Arabic', 'arabe']],
        'Aran' => ['161', ['Arabic (Nastaliq variant)', 'arabe (variante nastalique)']],
        'Armi' => ['124', ['Imperial Aramaic', 'araméen impérial']],
        'Armn' => ['230', ['Armenian', 'arménien']],
        'Avst' => ['134', ['Avestan', 'avestique']],
        'Bali' => ['360', ['Balinese', 'balinais']],
        'Bamu' => ['435', ['Bamum', 'bamoum']],
        'Bass' => ['259', ['Bassa Vah', 'bassa']],
        'Batk' => ['365', ['Batak', 'batak']],
        'Beng' => ['325', ['Bengali (Bangla)', 'bengalî (bangla)']],
        'Berf' => ['258', ['Beria Erfe', 'beria erfe']],
        'Bhks' => ['334', ['Bhaiksuki', 'bhaïksukî']],
        'Blis' => ['550', ['Blissymbols', 'symboles Bliss']],
        'Bopo' => ['285', ['Bopomofo', 'bopomofo']],
        'Brah' => ['300', ['Brahmi', 'brahma']],
        'Brai' => ['570', ['Braille', 'braille']],
        'Bugi' => ['367', ['Buginese', 'bouguis']],
        'Buhd' => ['372', ['Buhid', 'bouhide']],
        'Cakm' => ['349', ['Chakma', 'chakma']],
        'Cans' => ['440', ['Unified Canadian Aboriginal Syllabics', 'syllabaire autochtone canadien unifié']],
        'Cari' => ['201', ['Carian', 'carien']],
        'Cham' => ['358', ['Cham', 'cham (čam, tcham)']],
        'Cher' => ['445', ['Cherokee', 'tchérokî']],
        'Chis' => ['298', ['Chisoi', 'chisoi']],
        'Chrs' => ['109', ['Chorasmian', 'chorasmien']],
        'Cirt' => ['291', ['Cirth', 'cirth']],
        'Copt' => ['204', ['Coptic', 'copte']],
        'Cpmn' => ['402', ['Cypro-Minoan', 'syllabaire chypro-minoen']],
        'Cprt' => ['403', ['Cypriot syllabary', 'syllabaire chypriote']],
        'Cyrl' => ['220', ['Cyrillic', 'cyrillique']],
        'Cyrs' => ['221', ['Cyrillic (Old Church Slavonic variant)', 'cyrillique (variante slavonne)']],
        'Deva' => ['315', ['Devanagari (Nagari)', 'dévanâgarî']],
        'Diak' => ['342', ['Dives Akuru', 'dives akuru']],
        'Dogr' => ['328', ['Dogra', 'dogra']],
        'Dsrt' => ['250', ['Deseret (Mormon)', 'déseret (mormon)']],
        'Dupl' => ['755', ['Duployan shorthand, Duployan stenography', 'sténographie Duployé']],
        'Egyd' => ['70', ['Egyptian demotic', 'démotique égyptien']],
        'Egyh' => ['60', ['Egyptian hieratic', 'hiératique égyptien']],
        'Egyp' => ['50', ['Egyptian hieroglyphs', 'hiéroglyphes égyptiens']],
        'Elba' => ['226', ['Elbasan', 'elbasan']],
        'Elym' => ['128', ['Elymaic', 'élymaïque']],
        'Ethi' => ['430', ['Ethiopic (Geʻez)', 'éthiopien (geʻez, guèze)']],
        'Gara' => ['164', ['Garay', 'garay']],
        'Geok' => ['241', ['Khutsuri (Asomtavruli and Nuskhuri)', 'khoutsouri (assomtavrouli et nouskhouri)']],
        'Geor' => ['240', ['Georgian (Mkhedruli and Mtavruli)', 'géorgien (mkhédrouli et mtavrouli)']],
        'Glag' => ['225', ['Glagolitic', 'glagolitique']],
        'Gong' => ['312', ['Gunjala Gondi', 'gunjala gondî']],
        'Gonm' => ['313', ['Masaram Gondi', 'masaram gondî']],
        'Goth' => ['206', ['Gothic', 'gotique']],
        'Gran' => ['343', ['Grantha', 'grantha']],
        'Grek' => ['200', ['Greek', 'grec']],
        'Gujr' => ['320', ['Gujarati', 'goudjarâtî (gujrâtî)']],
        'Gukh' => ['397', ['Gurung Khema', 'gurung khema']],
        'Guru' => ['310', ['Gurmukhi', 'gourmoukhî']],
        'Hanb' => ['503', ['Han with Bopomofo (alias for Han + Bopomofo)', 'han avec bopomofo (alias pour han + bopomofo)']],
        'Hang' => ['286', ['Hangul (Hangŭl, Hangeul)', 'hangûl (hangŭl, hangeul)']],
        'Hani' => ['500', ['Han (Hanzi, Kanji, Hanja)', 'idéogrammes han (sinogrammes)']],
        'Hano' => ['371', ['Hanunoo (Hanunóo)', 'hanounóo']],
        'Hans' => ['501', ['Han (Simplified variant)', 'idéogrammes han (variante simplifiée)']],
        'Hant' => ['502', ['Han (Traditional variant)', 'idéogrammes han (variante traditionnelle)']],
        'Hatr' => ['127', ['Hatran', 'hatrénien']],
        'Hebr' => ['125', ['Hebrew', 'hébreu']],
        'Hira' => ['410', ['Hiragana', 'hiragana']],
        'Hluw' => ['80', ['Anatolian Hieroglyphs (Luwian Hieroglyphs, Hittite Hieroglyphs)', 'hiéroglyphes anatoliens (hiéroglyphes louvites, hiéroglyphes hittites)']],
        'Hmng' => ['450', ['Pahawh Hmong', 'pahawh hmong']],
        'Hmnp' => ['451', ['Nyiakeng Puachue Hmong', 'nyiakeng puachue hmong']],
        'Hrkt' => ['412', ['Japanese syllabaries (alias for Hiragana + Katakana)', 'syllabaires japonais (alias pour hiragana + katakana)']],
        'Hung' => ['176', ['Old Hungarian (Hungarian Runic)', 'runes hongroises (ancien hongrois)']],
        'Inds' => ['610', ['Indus (Harappan)', 'indus']],
        'Ital' => ['210', ['Old Italic (Etruscan, Oscan, etc.)', 'ancien italique (étrusque, osque, etc.)']],
        'Jamo' => ['284', ['Jamo (alias for Jamo subset of Hangul)', 'jamo (alias pour le sous-ensemble jamo du hangûl)']],
        'Java' => ['361', ['Javanese', 'javanais']],
        'Jpan' => ['413', ['Japanese (alias for Han + Hiragana + Katakana)', 'japonais (alias pour han + hiragana + katakana)']],
        'Jurc' => ['510', ['Jurchen', 'jurchen']],
        'Kali' => ['357', ['Kayah Li', 'kayah li']],
        'Kana' => ['411', ['Katakana', 'katakana']],
        'Kawi' => ['368', ['Kawi', 'kawi']],
        'Khar' => ['305', ['Kharoshthi', 'kharochthî']],
        'Khmr' => ['355', ['Khmer', 'khmer']],
        'Khoj' => ['322', ['Khojki', 'khojkî']],
        'Kitl' => ['505', ['Khitan large script', 'grande écriture khitan']],
        'Kits' => ['288', ['Khitan small script', 'petite écriture khitan']],
        'Knda' => ['345', ['Kannada', 'kannara (canara)']],
        'Kore' => ['287', ['Korean (alias for Hangul + Han)', 'coréen (alias pour hangûl + han)']],
        'Kpel' => ['436', ['Kpelle', 'kpèllé']],
        'Krai' => ['396', ['Kirat Rai', 'kirat rai']],
        'Kthi' => ['317', ['Kaithi', 'kaithî']],
        'Lana' => ['351', ['Tai Tham (Lanna)', 'taï tham (lanna)']],
        'Laoo' => ['356', ['Lao', 'laotien']],
        'Latf' => ['217', ['Latin (Fraktur variant)', 'latin (variante brisée)']],
        'Latg' => ['216', ['Latin (Gaelic variant)', 'latin (variante gaélique)']],
        'Latn' => ['215', ['Latin', 'latin']],
        'Leke' => ['364', ['Leke', 'léké']],
        'Lepc' => ['335', ['Lepcha (Róng)', 'lepcha (róng)']],
        'Limb' => ['336', ['Limbu', 'limbou']],
        'Lina' => ['400', ['Linear A', 'linéaire A']],
        'Linb' => ['401', ['Linear B', 'linéaire B']],
        'Lisu' => ['399', ['Lisu (Fraser)', 'lisu (Fraser)']],
        'Loma' => ['437', ['Loma', 'loma']],
        'Lyci' => ['202', ['Lycian', 'lycien']],
        'Lydi' => ['116', ['Lydian', 'lydien']],
        'Mahj' => ['314', ['Mahajani', 'mahâjanî']],
        'Maka' => ['366', ['Makasar', 'makassar']],
        'Mand' => ['140', ['Mandaic, Mandaean', 'mandéen']],
        'Mani' => ['139', ['Manichaean', 'manichéen']],
        'Marc' => ['332', ['Marchen', 'marchen']],
        'Maya' => ['90', ['Mayan hieroglyphs', 'hiéroglyphes mayas']],
        'Medf' => ['265', ['Medefaidrin (Oberi Okaime, Oberi Ɔkaimɛ)', 'médéfaïdrine']],
        'Mend' => ['438', ['Mende Kikakui', 'mendé kikakui']],
        'Merc' => ['101', ['Meroitic Cursive', 'cursif méroïtique']],
        'Mero' => ['100', ['Meroitic Hieroglyphs', 'hiéroglyphes méroïtiques']],
        'Mlym' => ['347', ['Malayalam', 'malayâlam']],
        'Modi' => ['324', ['Modi, Moḍī', 'modî']],
        'Mong' => ['145', ['Mongolian', 'mongol']],
        'Moon' => ['218', ['Moon (Moon code, Moon script, Moon type)', 'écriture Moon']],
        'Mroo' => ['264', ['Mro, Mru', 'mro']],
        'Mtei' => ['337', ['Meitei Mayek (Meithei, Meetei)', 'meitei mayek']],
        'Mult' => ['323', ['Multani', 'multanî']],
        'Mymr' => ['350', ['Myanmar (Burmese)', 'birman']],
        'Nagm' => ['295', ['Nag Mundari', 'nag mundari']],
        'Nand' => ['311', ['Nandinagari', 'nandinâgarî']],
        'Narb' => ['106', ['Old North Arabian (Ancient North Arabian)', 'nord-arabique']],
        'Nbat' => ['159', ['Nabataean', 'nabatéen']],
        'Newa' => ['333', ['Newa, Newar, Newari, Nepāla lipi', 'néwa, néwar, néwari, nepāla lipi']],
        'Nkdb' => ['85', ['Naxi Dongba (na²¹ɕi³³ to³³ba²¹, Nakhi Tomba)', 'naxi dongba']],
        'Nkgb' => ['420', ['Naxi Geba (na²¹ɕi³³ gʌ²¹ba²¹, \'Na-\'Khi ²Ggŏ-¹baw, Nakhi Geba)', 'naxi geba, nakhi geba']],
        'Nkoo' => ['165', ['N’Ko', 'n’ko']],
        'Nshu' => ['499', ['Nüshu', 'nüshu']],
        'Ogam' => ['212', ['Ogham', 'ogam']],
        'Olck' => ['261', ['Ol Chiki (Ol Cemet’, Ol, Santali)', 'ol tchiki']],
        'Onao' => ['296', ['Ol Onal', 'ol onal']],
        'Orkh' => ['175', ['Old Turkic, Orkhon Runic', 'orkhon']],
        'Orya' => ['327', ['Oriya (Odia)', 'oriyâ (odia)']],
        'Osge' => ['219', ['Osage', 'osage']],
        'Osma' => ['260', ['Osmanya', 'osmanais']],
        'Ougr' => ['143', ['Old Uyghur', 'ancien ouïgour']],
        'Palm' => ['126', ['Palmyrene', 'palmyrénien']],
        'Pauc' => ['263', ['Pau Cin Hau', 'paou chin haou']],
        'Pcun' => ['15', ['Proto-Cuneiform', 'proto-cunéiforme']],
        'Pelm' => ['16', ['Proto-Elamite', 'proto-élamite']],
        'Perm' => ['227', ['Old Permic', 'ancien permien']],
        'Phag' => ['331', ['Phags-pa', '’phags pa']],
        'Phli' => ['131', ['Inscriptional Pahlavi', 'pehlevi des inscriptions']],
        'Phlp' => ['132', ['Psalter Pahlavi', 'pehlevi des psautiers']],
        'Phlv' => ['133', ['Book Pahlavi', 'pehlevi des livres']],
        'Phnx' => ['115', ['Phoenician', 'phénicien']],
        'Plrd' => ['282', ['Miao (Pollard)', 'miao (Pollard)']],
        'Piqd' => ['293', ['Klingon (KLI pIqaD)', 'klingon (pIqaD du KLI)']],
        'Prti' => ['130', ['Inscriptional Parthian', 'parthe des inscriptions']],
        'Psin' => ['103', ['Proto-Sinaitic', 'proto-sinaïtique']],
        'Qaaa' => ['900', ['Reserved for private use (start)', 'réservé à l’usage privé (début)']],
        'Qabx' => ['949', ['Reserved for private use (end)', 'réservé à l’usage privé (fin)']],
        'Ranj' => ['303', ['Ranjana', 'ranjana']],
        'Rjng' => ['363', ['Rejang (Redjang, Kaganga)', 'redjang (kaganga)']],
        'Rohg' => ['167', ['Hanifi Rohingya', 'hanifi rohingya']],
        'Roro' => ['620', ['Rongorongo', 'rongorongo']],
        'Runr' => ['211', ['Runic', 'runique']],
        'Samr' => ['123', ['Samaritan', 'samaritain']],
        'Sara' => ['292', ['Sarati', 'sarati']],
        'Sarb' => ['105', ['Old South Arabian', 'sud-arabique, himyarite']],
        'Saur' => ['344', ['Saurashtra', 'saurachtra']],
        'Sgnw' => ['95', ['SignWriting', 'SignÉcriture, SignWriting']],
        'Shaw' => ['281', ['Shavian (Shaw)', 'shavien (Shaw)']],
        'Shrd' => ['319', ['Sharada, Śāradā', 'charada, shard']],
        'Shui' => ['530', ['Shuishu', 'shuishu']],
        'Sidd' => ['302', ['Siddham, Siddhaṃ, Siddhamātṛkā', 'siddham']],
        'Sidt' => ['180', ['Sidetic', 'sidétique']],
        'Sind' => ['318', ['Khudawadi, Sindhi', 'khoudawadî, sindhî']],
        'Sinh' => ['348', ['Sinhala', 'singhalais']],
        'Sogd' => ['141', ['Sogdian', 'sogdien']],
        'Sogo' => ['142', ['Old Sogdian', 'ancien sogdien']],
        'Sora' => ['398', ['Sora Sompeng', 'sora sompeng']],
        'Soyo' => ['329', ['Soyombo', 'soyombo']],
        'Sund' => ['362', ['Sundanese', 'sundanais']],
        'Sunu' => ['274', ['Sunuwar', 'sunuwar']],
        'Sylo' => ['316', ['Syloti Nagri', 'sylotî nâgrî']],
        'Syrc' => ['135', ['Syriac', 'syriaque']],
        'Syre' => ['138', ['Syriac (Estrangelo variant)', 'syriaque (variante estranghélo)']],
        'Syrj' => ['137', ['Syriac (Western variant)', 'syriaque (variante occidentale)']],
        'Syrn' => ['136', ['Syriac (Eastern variant)', 'syriaque (variante orientale)']],
        'Tagb' => ['373', ['Tagbanwa', 'tagbanoua']],
        'Takr' => ['321', ['Takri, Ṭākrī, Ṭāṅkrī', 'tâkrî']],
        'Tale' => ['353', ['Tai Le', 'taï-le']],
        'Talu' => ['354', ['New Tai Lue', 'nouveau taï-lue']],
        'Taml' => ['346', ['Tamil', 'tamoul']],
        'Tang' => ['520', ['Tangut', 'tangoute']],
        'Tavt' => ['359', ['Tai Viet', 'taï viêt']],
        'Tayo' => ['380', ['Tai Yo', 'taï yo']],
        'Telu' => ['340', ['Telugu', 'télougou']],
        'Teng' => ['290', ['Tengwar', 'tengwar']],
        'Tfng' => ['120', ['Tifinagh (Berber)', 'tifinagh (berbère)']],
        'Tglg' => ['370', ['Tagalog (Baybayin, Alibata)', 'tagal (baybayin, alibata)']],
        'Thaa' => ['170', ['Thaana', 'thâna']],
        'Thai' => ['352', ['Thai', 'thaï']],
        'Tibt' => ['330', ['Tibetan', 'tibétain']],
        'Tirh' => ['326', ['Tirhuta', 'tirhouta']],
        'Tnsa' => ['275', ['Tangsa', 'tangsa']],
        'Todr' => ['229', ['Todhri', 'todhri']],
        'Tols' => ['299', ['Tolong Siki', 'tolong siki']],
        'Toto' => ['294', ['Toto', 'toto']],
        'Tutg' => ['341', ['Tulu-Tigalari', 'tulu-tigalari']],
        'Ugar' => ['40', ['Ugaritic', 'ougaritique']],
        'Vaii' => ['470', ['Vai', 'vaï']],
        'Visp' => ['280', ['Visible Speech', 'parole visible']],
        'Vith' => ['228', ['Vithkuqi', 'vithkuqi']],
        'Wara' => ['262', ['Warang Citi (Varang Kshiti)', 'warang citi']],
        'Wcho' => ['283', ['Wancho', 'wantcho']],
        'Wole' => ['480', ['Woleai', 'woléaï']],
        'Xpeo' => ['30', ['Old Persian', 'cunéiforme persépolitain']],
        'Xsux' => ['20', ['Cuneiform, Sumero-Akkadian', 'cunéiforme suméro-akkadien']],
        'Yezi' => ['192', ['Yezidi', 'yézidi']],
        'Yiii' => ['460', ['Yi', 'yi']],
        'Zanb' => ['339', ['Zanabazar Square (Zanabazarin Dörböljin Useg, Xewtee Dörböljin Bicig, Horizontal Square Script)', 'zanabazar quadratique']],
        'Zinh' => ['994', ['Code for inherited script', 'codet pour écriture héritée']],
        'Zmth' => ['995', ['Mathematical notation', 'notation mathématique']],
        'Zsye' => ['993', ['Symbols (Emoji variant)', 'symboles (variante émoji)']],
        'Zsym' => ['996', ['Symbols', 'symboles']],
        'Zxxx' => ['997', ['Code for unwritten documents', 'codet pour les documents non écrits']],
        'Zyyy' => ['998', ['Code for undetermined script', 'codet pour écriture indéterminée']],
        'Zzzz' => ['999', ['Code for uncoded script', 'codet pour écriture non codée']]
    ];
}
