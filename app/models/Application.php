<?php

class Application extends Eloquent {

    protected $table = 'applications';

    protected $hidden = ['course_id', 'employment_status', 'resume_path', 'financing_status', 'referred_by', 'bg_info', 'questions'];

    public static $rules = [
        'course_id' => 'required|integer',
        'employment_status' => 'required',
        'financing_status' => 'required',
        'bg_info' => 'required',
    ];

    public function user() {
        return $this->belongsTo('User');
    }

    public function course() {
        return $this->belongsTo('Course');
    }

    /**
     * The directory for resume uploads.
     *
     * @var string
     */
    protected $docDir = 'doc-upload';


    /**
     * The function to handle resume uploads.
     *
     * @param  string  $resume
     */
    public function addUploadedResume($resume) {
        $systemPath = public_path() . '/' . $this->docDir . '/';
        //$resumeName = $this->id . '_' . $resume->getClientOriginalName();
        $resumeName = $resume->getClientOriginalName();
        $resume->move($systemPath, $resumeName);
        $this->resume_path = '/' . $this->docDir . '/' . $resumeName;
    }

    // Formats background information.
    public function setBGInfo($string) {
        
        $array = explode("\n", $string);
        foreach ($array as $key => $value) {
            $array[$key] = '<p>    ' . $value . '</p>';
        }
        $formattedInput = implode("\n", $array);

        $this->attributes['bg_info'] = $formattedInput;
    }

    // Formats questions submitted.
    public function setQuestions($string) {
        
        $array = explode("\n", $string);
        foreach ($array as $key => $value) {
            $array[$key] = '<p>' . $value . '</p>';
        }
        $formattedInput = implode("\n", $array);

        $this->attributes['questions'] = $formattedInput;
    }
}