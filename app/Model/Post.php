<?php 

class Post extends AppModel {
    public $validate = [
        'title' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'Please input title'
            ]
        ],
        'body' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'Please input content'
            ]
        ],
        'image' => [
            'rule' => [
                'extension',
                ['gif', 'jpeg', 'png', 'jpg']
            ],
            'message' => 'Please supply a valid image.'
        ],
    ];
}