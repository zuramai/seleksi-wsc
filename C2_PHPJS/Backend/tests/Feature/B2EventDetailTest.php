<?php

namespace WorldSkills\Trade17\Tests\Feature;

use WorldSkills\Trade17\Tests\Helper\ReadTest;

class B2EventDetailTest extends ReadTest
{
    /**
     * Test if a single event gets returned correctly with all relations
     */
    public function testB2aGetEventDetail()
    {
        $res = $this->http->get('/api/v1/organizers/demo1/events/wsc-2019');

        $this->assertStatusCode(200, $res);
        $this->assertHeadersContains(['content-type' => 'application/json'], $res);
        $this->assertResponse([
            'id' => 1,
            'name' => 'WorldSkills Conference 2019',
            'slug' => 'wsc-2019',
            'date' => '2019-09-23',
            'channels' => [
                [
                    'id' => 1,
                    'name' => 'Roadmaps to thriving societies',
                    'rooms' => [
                        [
                            'id' => 1,
                            'name' => 'Main hall',
                            'sessions' => [
                                [
                                    'id' => 1,
                                    'title' => 'Different place, same skills',
                                    'description' => 'In an increasingly globalized economy, flows of migrants are contributing to profound demographic changes and shifts in work. The need to create new international standards for skills development and applications in global, human-centered workplaces is more pressing than ever. How can countries harness these trends to build an inclusive global labour market, while recognizing diversity and local specificities?',
                                    'speaker' => 'Jens Bjornavold',
                                    'start' => '2019-09-23 09:00:00',
                                    'end' => '2019-09-23 09:45:00',
                                    'type' => 'talk',
                                    'cost' => null,
                                ],
                                [
                                    'id' => 2,
                                    'title' => 'Making work meaningful',
                                    'description' => 'The increasing shift in the values and cultures of our societies, and growing social and economic inequalities bring new expectations in workplaces. How do we move from discontent to fulfillment? This workshop will examine best practices from respective industries and share lessons learned towards more prosperous individuals and communities.',
                                    'speaker' => 'Abigail Fulton',
                                    'start' => '2019-09-23 10:00:00',
                                    'end' => '2019-09-23 11:30:00',
                                    'type' => 'talk',
                                    'cost' => null,
                                ],
                                [
                                    'id' => 5,
                                    'title' => 'Skills change lives',
                                    'description' => 'Through a series of five short inspiring speeches, changemakers will share solutions through skills to the most pressing social challenges we face, leading the way to an inclusive society.',
                                    'speaker' => 'Crispin Thorold',
                                    'start' => '2019-09-23 13:00:00',
                                    'end' => '2019-09-23 13:45:00',
                                    'type' => 'talk',
                                    'cost' => null,
                                ],
                            ],
                        ],
                        [
                            'id' => 2,
                            'name' => 'Room 1.1',
                            'sessions' => [
                                [
                                    'id' => 3,
                                    'title' => 'Skills and sustainability',
                                    'description' => 'By 2050, 66 percent of the world’s population is projected to be urban. Moreover, the rapid expansion of human settlements is changing social dynamics and the lifestyle of city-dwellers, especially in megacities. What will be their role as key stakeholders in our globalized world? And how does this affect skilled (and re-skilled) people to achieve sustainable urbanization?',
                                    'speaker' => 'Sebastien Turbot',
                                    'start' => '2019-09-23 10:00:00',
                                    'end' => '2019-09-23 11:30:00',
                                    'type' => 'talk',
                                    'cost' => null,
                                ],
                                [
                                    'id' => 4,
                                    'title' => 'Designing skills pathways',
                                    'description' => 'During this workshop, we summarize trends and challenges within three tracks: economy, society, and environment. Participants will exchange views on what skills, best practices, and solutions they need for their specific regions to meet demands and close their skills gap.',
                                    'speaker' => 'Dmitry Zabirov',
                                    'start' => '2019-09-23 13:00:00',
                                    'end' => '2019-09-23 15:00:00',
                                    'type' => 'workshop',
                                    'cost' => 50,
                                ],
                                [
                                    'id' => 6,
                                    'title' => 'Education ecosystem for the future',
                                    'description' => 'In our fast-changing world, traditional forms of education are becoming outdated. We need to redesign our education systems. What are approaches to learning work in this new world?',
                                    'speaker' => 'Pavel Luksha',
                                    'start' => '2019-09-23 15:00:00',
                                    'end' => '2019-09-23 17:00:00',
                                    'type' => 'workshop',
                                    'cost' => 30,
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 2,
                    'name' => 'Skills for evolving economies',
                    'rooms' => [
                        [
                            'id' => 3,
                            'name' => 'Room 1.3',
                            'sessions' => [
                                [
                                    'id' => 7,
                                    'title' => 'The future of work',
                                    'description' => 'What are young people’s expectations and concerns for their professional future? WorldSkills and the OECD have joined efforts to listen to the youth and provide them with a platform for action.',
                                    'speaker' => 'Shayne Maclachlan',
                                    'start' => '2019-09-23 11:00:00',
                                    'end' => '2019-09-23 11:45:00',
                                    'type' => 'talk',
                                    'cost' => null,
                                ],
                                [
                                    'id' => 8,
                                    'title' => 'Digital skills wave',
                                    'description' => 'Technological progress and the advent of the digital economy have created new business models and a demand for a more skilled workforce. However, uneven digital penetration across socio-economic landscapes results in a digital skills divide, with many people unable to catch up to the fast-paced digital workforce. What are the cutting-edge, promising skills of this field?',
                                    'speaker' => 'Jordan Shapiro',
                                    'start' => '2019-09-23 13:00:00',
                                    'end' => '2019-09-23 13:45:00',
                                    'type' => 'talk',
                                    'cost' => null,
                                ],
                            ],
                        ],
                        [
                            'id' => 4,
                            'name' => 'Room 2.1',
                            'sessions' => [
                                [
                                    'id' => 9,
                                    'title' => 'Training and innovation',
                                    'description' => 'In this rapidly evolving technological and digital world, adopting and maintaining the “right” skills can often feel like an impossible task. What are the skills missing in your industry? How can we collaborate to find solutions to close the skills gap? This workshop will explore new ways to train workforces to better adapt to our evolving economies.',
                                    'speaker' => 'Jayshree Seth',
                                    'start' => '2019-09-23 14:00:00',
                                    'end' => '2019-09-23 16:00:00',
                                    'type' => 'workshop',
                                    'cost' => 45,
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 3,
                    'name' => 'Towards self-sustaining ecosystems',
                    'rooms' => [
                        [
                            'id' => 5,
                            'name' => 'Room 3.1',
                            'sessions' => [
                                [
                                    'id' => 10,
                                    'title' => 'What are green skills?',
                                    'description' => 'The sustainability issues faced by our societies require a new kind of growth that guarantees that future generations will enjoy the high standards of living that we expect today. With this deepening collective conscience comes a need to explore and develop “green skills” that not only focus on sustainable production and frugal living, but also help us overcome environmental challenges in a systemic way.',
                                    'speaker' => 'Denise Amyot',
                                    'start' => '2019-09-23 10:00:00',
                                    'end' => '2019-09-23 10:45:00',
                                    'type' => 'talk',
                                    'cost' => null,
                                ],
                                [
                                    'id' => 11,
                                    'title' => 'Greening your workforce',
                                    'description' => 'This hands-on session will explore the green skills necessary for creating self-sustaining work ecosystems. How can sustainability be integrated into your industry\'s skills standards? What type of technologies and innovations will allow different industries to face the ecological transition and tackle climate change?',
                                    'speaker' => 'Nader Imani',
                                    'start' => '2019-09-23 13:00:00',
                                    'end' => '2019-09-23 14:30:00',
                                    'type' => 'workshop',
                                    'cost' => 25,
                                ],
                                [
                                    'id' => 12,
                                    'title' => 'Our planet in 2050',
                                    'description' => 'Five young adults take to the stage to share inspiring stories about leveraging skills to overcome environmental challenges, to more effectively incorporate climate change awareness into education and, more generally, to create solutions for a self-sustaining ecosystem.',
                                    'speaker' => 'Kehkashan Basu',
                                    'start' => '2019-09-23 15:00:00',
                                    'end' => '2019-09-23 16:00:00',
                                    'type' => 'talk',
                                    'cost' => null,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'tickets' => [
                [
                    'id' => 1,
                    'name' => 'Normal',
                    'description' => null,
                    'cost' => 210,
                    'available' => true,
                ],
                [
                    'id' => 2,
                    'name' => 'Early Bird',
                    'description' => 'Available until June 1, 2019',
                    'cost' => 110,
                    'available' => false,
                ],
                [
                    'id' => 3,
                    'name' => 'Hotel Package',
                    'description' => '50 tickets available',
                    'cost' => 550,
                    'available' => true,
                ],
            ],
        ], $res);
    }

    /**
     * B2a – Read all detail information of a single event
     *
     * Test all different special validity rules of the tickets.
     * For every validity type, a case where the ticket should be available and one where it should
     * no longer be available gets tested.
     */
    public function testB2aTicketValidity()
    {
        // test type = date with a date in the past
        $resDateExpired = $this->http->get('/api/v1/organizers/demo1/events/wsc-2019');
        $this->assertResponseItemAt('tickets.1', [
            'id' => 2,
            'name' => 'Early Bird',
            'description' => 'Available until June 1, 2019',
            'cost' => 110,
            'available' => false,
        ], $resDateExpired);

        // test type = date with a date in the future
        $resDateUpcoming = $this->http->get('/api/v1/organizers/demo2/events/vuejs-2019');
        $this->assertResponseItemAt('tickets.1', [
            'id' => 9,
            'name' => 'Early Bird',
            'description' => 'Available until October 1, 2019',
            'cost' => 149,
            'available' => true,
        ], $resDateUpcoming);

        // test type = amount with all tickets sold
        $resAmountUnavailable = $this->http->get('/api/v1/organizers/demo1/events/react-conf-2018');
        $this->assertResponseItemAt('tickets.1', [
            'id' => 5,
            'name' => 'Scholarship',
            'description' => '30 tickets available',
            'cost' => 100,
            'available' => false,
        ], $resAmountUnavailable);

        // test type = amount with some available tickets
        $resAmountAvailable = $this->http->get('/api/v1/organizers/demo2/events/ng-2019');
        $this->assertResponseItemAt('tickets.1', [
            'id' => 12,
            'name' => 'Front Row Seat',
            'description' => '60 tickets available',
            'cost' => 550,
            'available' => true,
        ], $resAmountAvailable);
    }

    /**
     * Test accessing a non-existing event and an event which belongs to different organizer
     */
    public function testB2aGetInvalidEvent()
    {
        // test with an existing organizer but invalid event
        $resEventNotExists = $this->http->get('/api/v1/organizers/demo1/events/invalid-event-slug');
        $this->assertStatusCode(404, $resEventNotExists);
        $this->assertResponse([
            'message' => 'Event not found',
        ], $resEventNotExists);

        // test with an existing organizer and existing event which was created by another organizer
        $resWrongOrganizer = $this->http->get('/api/v1/organizers/demo1/events/vuejs-2019');
        $this->assertStatusCode(404, $resWrongOrganizer);
        $this->assertResponse([
            'message' => 'Event not found',
        ], $resWrongOrganizer);

    }

    /**
     * Test accessing a non-existing organizer
     */
    public function testB2aGetInvalidOrganizer()
    {
        // test with an existing event but the organizer does not exist
        $resOrganizerNotExists = $this->http->get('/api/v1/organizers/invalid-organizer-slug/events/wsc-2019');
        $this->assertStatusCode(404, $resOrganizerNotExists);
        $this->assertResponse([
            'message' => 'Organizer not found',
        ], $resOrganizerNotExists);
    }
}
