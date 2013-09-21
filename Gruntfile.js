module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        jshint: {
            options: {
                //jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                'nivo-lightbox-init.js',
                '!nivo-lightbox-init.min.js'
            ]
        },
        recess: {
            dist: {
                options: {
                    compile: true,
                    compress: true
                },
                files: {
                    'nivo-lightbox.min.css': [
                        'nivo-lightbox.css'
                    ]
                }
            }
        },
        uglify: {
            options: {
                compress: true
            },
            build: {
                src: [
                    'nivo-lightbox-init.js'
                ],
                dest: 'nivo-lightbox-init.min.js'
            }
        },
        imageoptim: {
            files: [
                'themes/default'
            ],
            options: {
                quitAfter: true
            }
        },
        watch: {
            js: {
                files: [
                    '<%= jshint.all %>'
                ],
                tasks: ['jshint', 'uglify']
            }
        }
    });

    // Load tasks
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-recess');
    grunt.loadNpmTasks('grunt-imageoptim');

    // Register tasks
    grunt.registerTask('default', [
        'recess',
        'uglify'
    ]);
    grunt.registerTask('dev', [
        'watch'
    ]);
    grunt.registerTask('image', [
        'imageoptim'
    ]);
};
