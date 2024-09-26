<?php

namespace Slub\Dfgviewer\Validation;

use DOMDocument;
use DOMXPath;
use Kitodo\Dlf\Validation\AbstractDlfValidator;

abstract class ApplicationProfileBaseValidator extends AbstractDlfValidator
{
    const STRUCTURE_DATASET = array(
        'section', 'file', 'album', 'register', 'annotation', 'address', 'article', 'atlas', 'issue', 'bachelor_thesis', 'volume', 'contained_work', 'additional', 'report', 'official_notification', 'provenance', 'inventory', 'image', 'collation', 'ornament', 'letter', 'cover', 'cover_front', 'cover_back', 'diploma_thesis', 'doctoral_thesis', 'document', 'printers_mark', 'printed_archives', 'binding', 'entry', 'corrigenda', 'bookplate', 'fascicle', 'leaflet', 'research_paper', 'photograph', 'fragment', 'land_register', 'ground_plan', 'habilitation_thesis', 'manuscript', 'illustration', 'imprint', 'contents', 'initial_decoration', 'year', 'chapter', 'map', 'cartulary', 'colophon', 'ephemera', 'engraved_titlepage', 'magister_thesis', 'folder', 'master_thesis', 'multivolume_work', 'month', 'monograph', 'musical_notation', 'periodical', 'poster', 'plan', 'privileges', 'index', 'spine', 'scheme', 'edge', 'seal', 'paste down', 'stamp', 'study', 'table', 'day', 'proceeding', 'text', 'title_page', 'subinventory', 'act', 'judgement', 'verse', 'note', 'preprint', 'dossier', 'lecture', 'endsheet', 'paper', 'preface', 'dedication', 'newspaper'
    );

    protected DOMXpath $xpath;

    public function __construct()
    {
        parent::__construct(DOMDocument::class);
    }

    public function setValue($value): void
    {
        parent::setValue($value);
        $this->xpath = new DOMXPath($value);
    }
}
