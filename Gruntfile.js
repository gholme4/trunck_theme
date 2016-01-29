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
					'bower_components/foundation-sites/js/foundation.core.js',
					'bower_components/foundation-sites/js/foundation.util.*.js',

					// Paths to individual Foundation JS components defined below
					'bower_components/foundation-sites/js/foundation.abide.js',
					'bower_components/foundation-sites/js/foundation.accordion.js',
					'bower_components/foundation-sites/js/foundation.accordionMenu.js',
					'bower_components/foundation-sites/js/foundation.drilldown.js',
					'bower_components/foundation-sites/js/foundation.dropdown.js',
					'bower_components/foundation-sites/js/foundation.dropdownMenu.js',
					'bower_components/foundation-sites/js/foundation.equalizer.js',
					'bower_components/foundation-sites/js/foundation.interchange.js',
					'bower_components/foundation-sites/js/foundation.magellan.js',
					'bower_components/foundation-sites/js/foundation.offcanvas.js',
					'bower_components/foundation-sites/js/foundation.orbit.js',
					'bower_components/foundation-sites/js/foundation.responsiveMenu.js',
					'bower_components/foundation-sites/js/foundation.responsiveToggle.js',
					'bower_components/foundation-sites/js/foundation.reveal.js',
					'bower_components/foundation-sites/js/foundation.slider.js',
					'bower_components/foundation-sites/js/foundation.sticky.js',
					'bower_components/foundation-sites/js/foundation.tabs.js',
					'bower_components/foundation-sites/js/foundation.toggler.js',
					'bower_components/foundation-sites/js/foundation.tooltip.js',

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
                command: 'kss-node --placeholder "[modifier class]" --source ./scss --destination ./styleguide --css ./../css/screen.css --js ./../js/script.js --title "Trunck Styleguide" --homepage "./../kss-node-template/homepage.md" --verbose'
            }
        }
	});
	
	grunt.registerTask('build', ['copy', 'sass', 'concat', 'shell:styleguide', 'uglify']);
	grunt.registerTask('default', ['build']);
	grunt.registerTask('dev', ['build', 'watch']);
};