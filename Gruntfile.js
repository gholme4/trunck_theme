module.exports = function(grunt) {
	require('matchdep').filterDev('grunt-*').forEach( grunt.loadNpmTasks );
	var gulp = require('gulp'),
	styleguide = require('sc5-styleguide');

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		sass: {
			options: {
				sourceMap: false
			},

			screenProd: {
				options: {
					outputStyle: 'compressed',
					sourceComments: false
				},
				files: {
					'css/screen.min.css': 'scss/app.scss',
				}
			},
			screenDev: {
				options: {
					outputStyle: 'expanded',
					sourceComments: true
				},
				files: {
					'css/screen.css': 'scss/app.scss',
				}
			},
			print: {
				options: {
					outputStyle: 'compressed',
					sourceComments: false
				},
				files: {
					'css/print.min.css': 'scss/print.scss',
				}
			}

		},

		copy: {
			fontAwesome: {
				expand: true,
				cwd: 'bower_components/font-awesome/fonts/',
				src: ['**'],
				dest: 'fonts/'
			}

		},
		

		concat: {
			options: {
				separator: ';',
			},
			dist: {
				src: [
					'bower_components/what-input/what-input.js',
					'bower_components/foundation-sites/dist/foundation.js',

					// Motion UI
					'bower_components/motion-ui/motion-ui.js',

					// jQuery plugins
					'bower_components/jquery-cookie/jquery.cookie.js',

					// Custom JS
					'js/source/app.js'

				],
				dest: 'js/script.js',
			}

		},

		uglify: {
			dist: {
				files: {
					// uglify main script file for production
					'js/script.min.js': ['js/script.js']
				}
			}
		},
		
		watch: {
			grunt: { files: ['Gruntfile.js'] },

			sass: {
				files: 'scss/**/*.scss',
				tasks: ['copy', 'sass', 'shell:styleguide'],
				options: {
					livereload:true,
				}
			},

			js: {
				files: ['js/source/**/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					livereload:true,
				}
			}

		},
		shell: {
            styleguide: {
                options: {
                    execOptions: {
                        cwd: './'
                    }
                },
                // command for generating styleguide
                // flags for configuration are available here:
                // https://github.com/kss-node/kss-node#using-the-command-line-tool
                command: 'kss-node --placeholder "[modifier class]" --source ./scss --destination ./styleguide --css ./../css/screen.css --js ./../js/script.js --homepage "./../kss-node-template/homepage.md" -t "kss-node-template" --verbose'
            }
        }
	});
	
	grunt.registerTask('build', ['copy', 'sass', 'concat', 'shell:styleguide', 'uglify']);
	grunt.registerTask('default', ['build']);
	grunt.registerTask('dev', ['build', 'watch']);
};