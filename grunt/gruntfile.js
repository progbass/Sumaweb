

module.exports = function(grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		// chech our JS
		jshint: {
			options: {
				"bitwise": true,
				"browser": true,
				"curly": true,
				"eqeqeq": true,
				"eqnull": true,
				"esnext": true,
				"immed": true,
				"jquery": true,
				"latedef": true,
				"newcap": true,
				"noarg": true,
				"node": true,
				"strict": false,
				"trailing": true,
				"undef": true,
				"globals": {
					"jQuery": true,
					"alert": true
				}
			},
			all: [
				'gruntfile.js',
				'../js/main.js'
			]
		},

		// concat and minify our JS
		uglify: {
			dist: {
				files: {
					'../js/main.min.js': [
						'../js/main.js'
					]
				}
			}
		},

		// compile your sass
		sass: {
			dev: {
				options: {
					style: 'expanded'
				},
				src: ['../scss/style.scss'],
				dest: '../style.css'
			},
			prod: {
				options: {
					style: 'compressed'
				},
				src: ['../scss/style.scss'],
				dest: '../style.css'
			},
			editorstyles: {
				options: {
					style: 'expanded'
				},
				src: ['../scss/wp-editor-style.scss'],
				dest: '../css/wp-editor-style.css'
			}
		},


		// watch for changes
		watch: {
			options: {
                spawn: false    // This is very important
			},

			scss: {
				files: ['../scss/**/*.scss'],
				tasks: [
					'sass:dev',
					'sass:editorstyles',
					//'notify:scss',
				]
			},
			js: {
				files: [
					'<%= jshint.all %>'
				],
				tasks: [
					//'jshint',
					'uglify',
					//'notify:js',
				]
			}
		},

		// check your php
		phpcs: {
			application: {
				dir: '../*.php'
			},
			options: {
				bin: '/usr/bin/phpcs'
			}
		},

		// notify cross-OS
		notify: {
			scss: {
				options: {
					title: 'Grunt, grunt!',
					message: 'SCSS is all gravy'
				}
			},
			js: {
				options: {
					title: 'Grunt, grunt!',
					message: 'JS is all good'
				}
			},
			dist: {
				options: {
					title: 'Grunt, grunt!',
					message: 'Theme ready for production'
				}
			}
		},

		clean: {
			dist: {
				src: ['../dist'],
				options: {
					force: true
				}
			}
		},

		copyto: {
			dist: {
				files: [
					{cwd: '../', src: ['**/*'], dest: '../dist/'}
				],
				options: {
					ignore: [
						'../dist{,/**/*}',
						'../doc{,/**/*}',
						'../grunt{,/**/*}',
						'../scss{,/**/*}'
					]
				}
			}
		},



		browserSync: {
			dev: {
				bsFiles: {
                    src : [
                        '../*.css',
                        '../*.php'
                    ]
                },

				options: {
                    watchTask: true,
                    //server: '../',
					proxy: "http://localhost:8888/",
					startPath: 'Suma/wordpress/'
				}
			}
		}
	});

	// Load NPM's via matchdep
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);




	// Serve task
	grunt.registerTask('serve', [
		'browserSync',
		'watch'
	]);



	// Development task
	grunt.registerTask('default', [
		//'jshint',
		'uglify',
		'sass:dev',
		'sass:editorstyles'
	]);

	// Production task
	grunt.registerTask('dist', function() {
		grunt.task.run([
			'jshint',
			'uglify',
			'sass:prod',
			'sass:editorstyles',
			'clean:dist',
			'copyto:dist',
			'notify:dist'
		]);
	});
};